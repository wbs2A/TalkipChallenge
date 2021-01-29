<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RelationshipUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        for ($user=1; $user < 5; $user++){
            for ($list = 1; $list <10; $list++)
                DB::table('user_has_contact_list')->insert(
                    [
                        'user_id' => $user,
                        'contact_list_id' => $list
                    ]
                );
        }
    }
}
