<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListaFluxuriPtPpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista_fluxuri_pp', function (Blueprint $t) {
            $t->increments('id')->unsigned();
            $t->integer('instalatie_id')->unsigned()->default(0)->nullable();
            $t->string('nume')->nullable();
            $t->string('cod')->nullable();
            $t->string('detalii')->nullable();
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
        Schema::table('lista_fluxuri_pp', function (Blueprint $t) {
            $t->drop();
        });
    }
}

