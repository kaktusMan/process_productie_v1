<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndicatoriMonitorizareTable extends Migration
{
    public function up()
    {
        Schema::create('indicatori_monitorizare', function(Blueprint $t){
            $t->increments('id');
            $t->integer('proiect_id')->nullable();
            $t->string('nume')->nullable();
            $t->string('luna_1')->nullable();
            $t->string('luna_2')->nullable();
            $t->string('luna_3')->nullable();
            $t->string('luna_4')->nullable();
            $t->string('luna_5')->nullable();
            $t->string('luna_6')->nullable();
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
        Schema::table('indicatori_monitorizare', function (Blueprint $t) {
            $t->drop();
        });
    }
}