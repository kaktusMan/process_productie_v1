<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrulProiecteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrul_proiecte', function(Blueprint $t){
            $t->increments('id');
            $t->dateTime('data_adaugarii');
            $t->string('nume');
            $t->string('cod');
            $t->string('segment_adresare');
            $t->string('board');
            $t->string('executiv');
            $t->string('p_m');
            $t->string('tip_poriect');
            $t->string('link_access');
            $t->string('validare');
            $t->string('prioritate');
            $t->string('stadiu');
            $t->string('detalii');
            $t->string('business_unit');
            $t->string('societate_implementatoare');
            $t->dateTime('termen_inceput');
            $t->dateTime('testare_estimata');
            $t->dateTime('testare_reala');
            $t->dateTime('intr_in_prod_partiala_estimata');
            $t->dateTime('intr_in_prod_partiala_reala');
            $t->dateTime('intr_in_prod_completa_estimata');
            $t->dateTime('intr_in_prod_completa_reala');
            $t->double('buget_estimat');
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
        Schema::table('registrul_proiecte', function (Blueprint $t) {
            $t->drop();
        });
    }
}
