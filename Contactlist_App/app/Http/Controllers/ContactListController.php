<?php

namespace App\Http\Controllers;

use App\Charts\ContactListChart;
use App\Models\Contact;
use App\Models\ContactList;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContactListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        $_return = [];
        if(!Auth::check()){
            return view('index', ["data" => []]);
        }

        $contacts_list = DB::table('contacts_lists')
            ->join('user_has_contact_list',
                   'contacts_lists.id', '=',
                 'user_has_contact_list.contact_list_id')
            ->where('user_id', '=', Auth::user()->id)
            ->get('*');

        foreach ($contacts_list as $contact_list){
            $relateds = DB::table('contacts')
                ->join('contact_list_has_contact', 'contacts.id',
                    '=', 'contact_list_has_contact.contact_id')
                ->where('contact_list_id', '=', $contact_list->id)
                ->get(
                    array('id','name','phone','cpf','status','created_at')
                );

            array_push($_return,
                array("list_id"=> $contact_list->id,
                      "list_name" =>$contact_list->name,
                      "contacts"=>$relateds
                )
            );
            $data = $this->paginate($_return);
        }
        return view('index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(){
        return view('new_contactlist');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request){
        $new_list = ContactList::create([
                        'name' => $request->list_name,
                        'created_at' => time()
                    ]);
        $new_list->save();
        DB::table('user_has_contact_list')->insert(['user_id'=> Auth::id(), 'contact_list_id'=>$new_list->id]);
        return redirect()->action(
                [ContactController::class, 'show_contact_insert_form'],
                ['list_name' => $request->list_name, 'list_id' => $new_list->id]
               );
    }

    /**
     * Display the reports for the selected list.
     *
     * @param  \App\Models\ContactList  $contactList
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showReports($list_id){
        //redirect to home if the list don't belongs to the current user
        if (!$this->check_contactlist_user($list_id))
            return redirect('/');

        $chart = new ContactListChart;
        $chart->type = 'pie';
        $chart->loaderColor = "#e0f2f1";
        $chart->title("Dimensão dos tipos de contato");
        $chart->labels(['A', 'B', 'C']);
        $chart->dataset("?", "pie", array(10, 20, 70))
            ->backgroundColor(collect(['#7158e2','#3ae374', '#ff3838']));


        return view('reports/status_list_report', compact('chart'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactList  $contactList
     * @return \Illuminate\Http\Response
     */
    public function show(ContactList $contactList){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactList  $contactList
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactList $contactList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactList  $contactList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactList $contactList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactList  $contactList
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactList $contactList){
        //
    }

    /**
     * The attributes that are mass assignable.
     * this function are made by the article:
     * https://www.itsolutionstuff.com/post/how-to-create-pagination-from-array-in-laravelexample.html
     *
     * @var array
     */
    public function paginate($items, $perPage = 5, $page = null, $options = []){

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);

    }

    /**
     * Checks if the selected list belongs to the current user
     *
     * @var boolean
     */
    public function check_contactlist_user($list_id){
        return DB::table("user_has_contact_list")
            ->where('user_id', '=', Auth::id())
            ->where('contact_list_id', '=', $list_id)
            ->exists();
    }
}
