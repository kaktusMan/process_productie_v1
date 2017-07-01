<?php

namespace App\Models\InstrumenteDeLucru\Componente;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\OptionsArray;

class ModFolosinta extends Model
{
	use SoftDeletes;
	use OptionsArray;

	protected $table = 'moduri_folosinta_il';

	public function il_posibile()
    {
        return $this->hasMany('App\Models\InstrumenteDeLucru\Componente\IlPosibil');
    }
}