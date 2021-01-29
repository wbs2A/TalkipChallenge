<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RelationshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        for ($list=1; $list < 10; $list++){
            for ($contact = 1; $contact <5; $contact++)
                DB::table('contact_list_has_contact')->insert(
                    [
                        'contact_id' => $contact,
                        'contact_list_id' => $list
                    ]
                );
        }
    }
}
