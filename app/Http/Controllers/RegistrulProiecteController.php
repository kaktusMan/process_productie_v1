<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrulProiecteController extends Controller
{
    public function index(Request $request){
		return view('registrul_general.registrul_proiecte.index');
	}
}
