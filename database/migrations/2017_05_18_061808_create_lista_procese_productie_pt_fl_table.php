<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListaProceseProductiePtFlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista_procese_productie_pt_fl', function (Blueprint $t) {
            $t->increments('id')->unsigned();
            $t->integer('flux_aferent_pp_id')->unsigned()->default(0)->nullable();
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
        Schema::table('lista_procese_productie_pt_fl', function (Blueprint $t) {
            $t->drop();
        });
    }
}
