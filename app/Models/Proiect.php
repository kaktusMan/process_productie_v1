<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\OptionsArray;

class Proiect extends Model
{
	use SoftDeletes;
	use OptionsArray;

	protected $table = 'registrul_proiecte';

	public function dateGenerale(){
		return $this->hasMany('App\Models\InitProiect');
	}

	public function obiective(){
		return $this->hasMany('App\Models\ObiectivProiect');
	}

	public function constringeri(){
		return $this->hasMany('App\Models\ConstrangereProiect');
	}

	public function finantari(){
		return $this->hasMany('App\Models\ModFinantare');
	}

	public function solutii(){
		return $this->hasMany('App\Models\SolutieProiect');
	}

	public function justificariSolutii(){
		return $this->hasMany('App\Models\JustificareSolutieProiect');
	}

	public function indicatoriMonitorizare(){
		return $this->hasMany('App\Models\IndicatorMonitorizare');
	}

	public function departamenteSuport(){
		return $this->hasMany('App\Models\DepartamentSuportProiect');
	}

	public function echipaProiect(){
		return $this->hasMany('App\Models\EchipaProiect');
	}

	public function livrabileProiect(){
		return $this->hasMany('App\Models\LivrabilaProiect');
	}

	public function proceseAferenteProiectului(){
		return $this->hasMany('App\Models\ProcesAferentProiectului');
	}
	
	public function pacheteDeLucru(){
		return $this->hasMany('App\Models\PachetDeLucru');
	}
} 



