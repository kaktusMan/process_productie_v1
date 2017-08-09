<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivrabileProiectTable extends Migration
{
    public function up()
    {
        Schema::create('livrabile_proiect', function(Blueprint $t){
            $t->increments('id');
            $t->integer('proiect_id')->nullable();
            $t->string('nume')->nullable();
            $t->string('termen_limita')->nullable();
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
        Schema::table('livrabile_proiect', function (Blueprint $t) {
            $t->drop();
        });
    }
}