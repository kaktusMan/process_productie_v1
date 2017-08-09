<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProceseAferentaProcesuluiTable extends Migration
{ 
    public function up()
    {
        Schema::create('procese_aferente_procesului', function(Blueprint $t){
            $t->increments('id');
            $t->integer('proiect_id')->nullable();
            $t->string('nume')->nullable();
            $t->string('responsabil_board')->nullable();
            $t->string('p_m')->nullable();
            $t->string('responsabil_directorat')->nullable();
            $t->string('responsabil_proces')->nullable();
            $t->string('responsabil_tehnic')->nullable();
            $t->string('resp_tehn_implementare')->nullable();
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
        Schema::table('procese_aferente_procesului', function (Blueprint $t) {
            $t->drop();
        });
    }
}





