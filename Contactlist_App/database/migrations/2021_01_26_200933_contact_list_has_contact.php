<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ContactListHasContact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('contact_list_has_contact', function (Blueprint $table){
        $table->integer('contact_id')->unsigned();
        $table->integer('contact_list_id')->unsigned();

        $table->foreign('contact_list_id')->references('id')->on('contacts_list')->onDelete('cascade');
        $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
