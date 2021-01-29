<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Propaganistas\LaravelPhone\Rules\Phone;


class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $status = array("A", "B", "C");
        for ($i = 1; $i <50; $i++) {
            shuffle($status);
            DB::table('contacts')->insert(
                [
                    'name' => Str::random(10),
                    'phone' => Str::random(11),
                    'cpf' => Str::random(11),
                    'Status' => $status[0]
                ]
            );
        }

    }
}
