<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartamenteSuportTable extends Migration
{
    public function up()
    {
        Schema::create('departamente_suport', function(Blueprint $t){
            $t->increments('id');
            $t->integer('proiect_id')->nullable();
            $t->string('nume')->nullable();
            $t->string('activitate')->nullable();
            $t->string('str_indicator')->nullable();
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
        Schema::table('departamente_suport', function (Blueprint $t) {
            $t->drop();
        });
    }
}
