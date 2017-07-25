<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrulIdeiTable extends Migration
{

    public function up()
    {
        Schema::create('registrul_idei', function (Blueprint $t) {
            $t->increments('id');
            $t->dateTime('data_introducerii')
            $t->string('segment_asociat');
            $t->string('cod_idee');
            $t->string('formare_idee');
            $t->string('promotor_idee');
            $t->string('tip_inovare');
            $t->string('status');
            $t->string('tip_prioritate');
            $t->steing('stadiu');
            $t->steing('detalii');
            $t->timestamps();
            $t->softDeletes();   
        });
    }

    public function down()
    {
        Schema::table('registrul_idei', function (Blueprint $t) {
            $t->drop();
        });
    }
}