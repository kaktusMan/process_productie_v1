<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacheteLucruDetaliiTable extends Migration
{

    public function up()
    {
        Schema::create('pachete_lucru_detalii', function(Blueprint $t){
            $t->increments('id');
            $t->integer('pachet_de_lucru_id')->nullable();
            $t->string('actiune')->nullable();
            $t->string('responsabil')->nullable();
            $t->string('termen_limita')->nullable();
            $t->string('stadiu')->nullable();
            $t->string('observatii')->nullable();
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
        Schema::table('pachete_lucru_detalii', function (Blueprint $t) {
            $t->drop();
        });
    }
}