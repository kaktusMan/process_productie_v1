<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Concept extends Model
{	
	use SoftDeletes;
    protected $table="registrul_concepte";



    
    
}
