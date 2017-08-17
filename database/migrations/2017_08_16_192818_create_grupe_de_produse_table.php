<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrupeDeProduseTable extends Migration
{
    public function up()
    {
        Schema::create('grupe_de_produse', function(Blueprint $t){
            $t->increments('id');
            $t->string('nume')->nullable();
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
        Schema::table('grupe_de_produse', function (Blueprint $t) {
            $t->drop();
        });
    }
}
