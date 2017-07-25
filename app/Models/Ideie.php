<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\OptionsArray;

class Ideie extends Model
{
	use SoftDeletes;
	use OptionsArray;

	protected $table = "registrul_idei";

} 