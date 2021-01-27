<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('contacts')->insert([
            'name' => Str::random(10),
        'phone' => Rule::phone()->country(['BR', 'BR']),
            'cpf' => Str::random(11),
            'Status' => Str::random(1)
        ]);
    }
}
