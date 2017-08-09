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
            $t->string('data_introducerii');
            $t->string('segment_asociat');
            $t->string('cod_concept');
            $t->string('formare_concept');
            $t->string('promotor_concept');
            $t->string('tip_inovare');
            $t->string('status');
            $t->string('tip_prioritate');
            $t->string('stadiu');
            $t->string('detalii');
            
            $t->string('ideea_de_baza')->nullable();
            $t->string('avantajele_aduse')->nullable();
            $t->string('impact')->nullable();
            $t->string('particularitati_concept')->nullable();
            $t->string('infrastructura')->nullable();
            $t->float('estimare_buget')->nullable();
            $t->string('potentialii_clienti')->nullable();

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
        Schema::table('registrul_concepte', function (Blueprint $t) {
            $t->drop();
        });
    }
}
