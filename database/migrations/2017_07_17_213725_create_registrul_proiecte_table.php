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
            $t->string('data_adaugarii');
            $t->string('nume');
            $t->string('cod');
            $t->string('segment_adresare');
            $t->string('board');
            $t->string('executiv');
            $t->string('p_m');
            $t->string('tip_proiect'); 
            $t->string('validare');
            $t->string('prioritate');
            $t->string('stadiu');
            $t->string('detalii');
            $t->string('business_unit');
            $t->string('societate_implementatoare');
            $t->string('termen_inceput');
            $t->string('testare_estimata');
            $t->string('testare_reala');
            $t->string('intr_in_prod_partiala_estimata');
            $t->string('intr_in_prod_partiala_reala');
            $t->string('intr_in_prod_completa_estimata');
            $t->string('intr_in_prod_completa_reala');
            $t->double('buget_estimat');

            $t->string('data_initierii')->nullable(); 
            $t->string('scop_proiect')->nullable(); 

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
        Schema::table('registrul_proiecte', function (Blueprint $t) {
            $t->drop();
        });
    }
}
