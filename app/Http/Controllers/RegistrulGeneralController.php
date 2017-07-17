<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrulGeneralController extends Controller
{	
	public function index(Request $request){
		return view('registrul_general.index');
	}
}
