<?php
namespace App\Models\NomenclatorLotus;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grupa extends Model
{	
	use SoftDeletes;
    protected $table="grupe_de_produse";

    public function familii(){
    	return $this->hasMany('App\Models\NomenclatorLotus\Familia');
    }

    
}
