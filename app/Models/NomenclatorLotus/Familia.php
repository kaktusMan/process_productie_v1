<?php
namespace App\Models\NomenclatorLotus;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Familia extends Model
{	
	use SoftDeletes;
    protected $table="familii_de_produse";


    public function grupa(){
    	return $this->belongsTo('App\Models\NomenclatorLotus\Grupa', 'grupa_id');
    }


    public function modele(){
    	return $this->hasMany('App\Models\NomenclatorLotus\ModelProd');
    }

    
    
}
