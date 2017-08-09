<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObiectiveProiectTable extends Migration
{

    public function up()
    {
        Schema::create('obiective_proiect', function(Blueprint $t){
            $t->increments('id');
            $t->integer('proiect_id')->nullable();
            $t->string('nume');
            $t->timestamps();
            $t->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('obiective_proiect', function (Blueprint $t) {
            $t->drop();
        });
    }
}