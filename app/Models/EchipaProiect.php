<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\OptionsArray;

class EchipaProiect extends Model
{
	use SoftDeletes;
	use OptionsArray;

	protected $table = 'echipa_proiect';

	public function proiect(){
		return $this->belongsTo('App\Models\Proiect', 'proiect_id');
	}

} 