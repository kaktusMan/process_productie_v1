<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\OptionsArray;

class DepartamentSuportProiect extends Model
{
	use SoftDeletes;
	use OptionsArray;

	protected $table = 'departamente_suport';

	public function proiect(){
		return $this->belongsTo('App\Models\Proiect', 'proiect_id');
	}

} 