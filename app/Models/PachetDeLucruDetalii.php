<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\OptionsArray;

class PachetDeLucruDetalii extends Model
{
	use SoftDeletes;
	use OptionsArray;

	protected $table = 'pachete_lucru_detalii';

	public function pachet(){
		return $this->belongsTo('App\Models\PachetDeLucru', 'pachet_id');
	}

} 