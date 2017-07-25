<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrulConcepteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrul_concepte', function(Blueprint $t){
            $t->increments('id');
            $t->dateTime('data_introducerii')
            $t->string('segment_asociat');
            $t->string('cod_concept');
            $t->string('formare_concept');
            $t->string('promotor_concept');
            $t->string('tip_inovare');
            $t->string('status');
            $t->string('tip_prioritate');
            $t->steing('stadiu');
            $t->steing('detalii');
            $t->timestemps();
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
        Schema::table('registrul_concepte', function (Blueprint $t) {
            $t->drop();
        });
    }
}
