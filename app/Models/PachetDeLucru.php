<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\OptionsArray;

class PachetDeLucru extends Model
{
	use SoftDeletes;
	use OptionsArray;

	protected $table = 'pachete_lucru';

	public function proiect(){
		return $this->belongsTo('App\Models\Proiect', 'proiect_id');
	}


	public function detaliiPachet(){
		return $this->hasMany('App\Models\PachetDeLucruDetalii');
	}

} 