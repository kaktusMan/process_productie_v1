<?php
namespace App\Models\NomenclatorLotus;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModelProd extends Model
{	
	use SoftDeletes;
    protected $table="modele_de_produse";


    public function familia(){
    	return $this->belongsTo('App\Models\NomenclatorLotus\Familia', 'familia_id');
    }
    
    
}
