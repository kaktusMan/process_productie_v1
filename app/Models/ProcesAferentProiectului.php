<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\OptionsArray;

class ProcesAferentProiectului extends Model
{
	use SoftDeletes;
	use OptionsArray;

	protected $table = 'procese_aferente_procesului';

	public function proiect(){
		return $this->belongsTo('App\Models\Proiect', 'proiect_id');
	}

} 