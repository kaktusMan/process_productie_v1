<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamiliiDeProduseTable extends Migration
{
    public function up()
    {
        Schema::create('familii_de_produse', function(Blueprint $t){
            $t->increments('id'); 
            $t->integer('grupa_id')->nullable();
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
        Schema::table('familii_de_produse', function (Blueprint $t) {
            $t->drop();
        });
    }
}
