<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\OptionsArray;

class JustificareSolutieProiect extends Model
{
	use SoftDeletes;
	use OptionsArray;

	protected $table = 'justificare_solutii_proiect';

	public function proiect(){
		return $this->belongsTo('App\Models\Proiect', 'proiect_id');
	}

} 