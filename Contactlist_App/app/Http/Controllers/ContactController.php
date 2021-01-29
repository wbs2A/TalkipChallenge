<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //
    }

    public function extract_data(Request $request){
        $tmp = 0;
        $_tmparr = [];
        $_result = [];
        foreach ($request->all() as $element){
            switch ($tmp){
                case 0:
                case 1:
                    break;
                case 2:
                    array_push($_tmparr, ["name"=> $element]);
                    break;
                case 3:
                    array_push($_tmparr, ["cpf"=> $element]);
                    break;
                case 4:
                    array_push($_tmparr, ["phone"=> $element]);
                    break;
                case 5:
                    array_push($_tmparr, ["status"=> $element]);
                    break;
                case 6:
                    array_push($_result, $_tmparr);
                    $_tmparr = [];
                    array_push($_tmparr, ["name"=> $element]);
                    $tmp = 2;
                    break;
            }
            $tmp++;

        }
        return $_result;
    }

    public function insert_contact($contact_info, $list_id){
        $_contact = new Contact;
        $_contact->name = $contact_info['0']["name"];
        $_contact->cpf = $contact_info['1']["cpf"];
        $_contact->phone = $contact_info['2']["phone"];
        $_contact->status = $contact_info['3']["status"];
        $_contact->save();
        DB::table("contact_list_has_contact")->insert(
            array(
                "contact_id" => $_contact->id,
                "contact_list_id" => $list_id
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request){
        $data_result = $this->extract_data($request);
        foreach ($data_result as $contact){
            $this->insert_contact($contact, $request->list_id);
        }
        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact){
        //
    }

    /**
     * Receive the recently created list and show the form to insert contacts.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function show_contact_insert_form(Request $redirect_args){
        $context = ["list_name"=> $redirect_args->list_name,
                    "list_id"=>$redirect_args->list_id];
        return view('contacts_insert', compact('context'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact){
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
