<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModeleDeProduseTable extends Migration
{
    public function up()
    {
        Schema::create('modele_de_produse', function(Blueprint $t){
            $t->increments('id');
            $t->integer('familia_id')->nullable();
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
        Schema::table('modele_de_produse', function (Blueprint $t) {
            $t->drop();
        });
    }
}
