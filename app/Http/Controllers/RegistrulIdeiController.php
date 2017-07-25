<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Validator;
use App\Models\Tools;
use App\Models\Ideie;

class RegistrulIdeiController extends Controller
{   
    public function index(){ 
        return view('registrul_general.registrul_idei.index', [
            'idei' => Ideie::all()
        ]);
    }

    public function create() 
    {        
        return view('registrul_general.registrul_idei.add_edit', [
            'ideie' => new Ideie(),
            'segmente_de_asociere' => Tools::segmente_de_asociere(),
            'tipuri_inovare' => Tools::tipuri_inovare(),
            'validare_pt_dezvoltare' => Tools::validare_pt_dezvoltare(),
            'prioritate_de_dezvoltare' => Tools::prioritate_de_dezvoltare(),
            'stadiul_inceperii' => Tools::stadiul_inceperii(),
            'form_title' => 'Creare idee',
            'form_route' => route('registrul-idei::store')
        ]);
    }
 
    public function store(Request $request) 
    {    
    	$validation = $this->validateRequest($request);
        if ($validation) { return $validation; }

        $ideie = new Ideie();

        $ideie->data_introducerii = $request->input('data_introducerii');
        $ideie->segment_asociat = $request->input('segment_asociat'); 
        $ideie->cod_idee = $request->input('cod_idee'); 
        $ideie->formare_idee = $request->input('formare_idee');
        $ideie->promotor_idee = $request->input('promotor_idee');
        $ideie->tip_inovare = $request->input('tip_inovare'); 
        $ideie->status = $request->input('status'); 
        $ideie->tip_prioritate = $request->input('tip_prioritate'); 
        $ideie->stadiu = $request->input('stadiu'); 
        $ideie->detalii = $request->input('detalii'); 


        if ($ideie->save()) 
        {   
            return redirect()->route('registrul-idei::list')->with('alert-success', 'Idee salvata cu succes');
        } 
        else
        {
            return redirect()->route('registrul-idei::list')->with('alert-danger', 'Eroare salvare idee');
        }
    }
 
    public function edit(Ideie $ideie) 
    {   
        if (is_null($ideie)) { return redirect(route('registrul-idei::list'))->with('alert-danger', 'Ideea nu exista'); }

        return view('registrul_general.registrul_idei.add_edit', [
            'ideie' => $ideie, 
            'segmente_de_asociere' => Tools::segmente_de_asociere(),
            'tipuri_inovare' => Tools::tipuri_inovare(),
            'validare_pt_dezvoltare' => Tools::validare_pt_dezvoltare(),
            'prioritate_de_dezvoltare' => Tools::prioritate_de_dezvoltare(),
            'stadiul_inceperii' => Tools::stadiul_inceperii(),
            'form_title' => 'Editare idee',
            'form_route' => route('registrul-idei::update', ['id' => $ideie->id])
        ]);
    }
 
    public function update(Request $request, Ideie $ideie) 
    {
    	$validation = $this->validateRequest($request, $ideie);
        if ($validation) { return $validation; }

        if (is_null($ideie)) { return redirect(route('registrul-idei::list'))->with('alert-danger', 'Ideea nu exista'); }

        $ideie->data_introducerii = $request->input('data_introducerii');
        $ideie->segment_asociat = $request->input('segment_asociat'); 
        $ideie->cod_idee = $request->input('cod_idee'); 
        $ideie->formare_idee = $request->input('formare_idee');
        $ideie->promotor_idee = $request->input('promotor_idee');
        $ideie->tip_inovare = $request->input('tip_inovare'); 
        $ideie->status = $request->input('status'); 
        $ideie->tip_prioritate = $request->input('tip_prioritate'); 
        $ideie->stadiu = $request->input('stadiu'); 
        $ideie->detalii = $request->input('detalii'); 

        if ($ideie->save()) 
        {   
            return redirect()->route('registrul-idei::list')->with('alert-success', 'Ideea salvata cu succes');
        } 
        else
        {
            return redirect()->route('registrul-idei::list')->with('alert-danger', 'Eroare salvare idee');
        }
    }

    public function delete(Ideie $ideie) 
    {       
        if (is_null($ideie)) { return redirect()->route('registrul-idei::list')->with('alert-danger', 'Ideea nu exista'); }

        if ($ideie->delete()) 
        {
            return redirect()->route('registrul-idei::list')->with('alert-success', 'Ideea eliminata cu succes');
        } 
        else
        {
            return redirect()->route('registrul-idei::list')->with('alert-danger', 'Eroare eliminare idee');
        }
    }

    protected function validateRequest($request, $ideie = null) 
    {	
    	$rules  = array(
            'data_introducerii' => 'required',
            'segment_asociat' => 'required',
            'cod_idee' => 'required',
            'formare_idee' => 'required',
            'promotor_idee' => 'required',
            'tip_inovare' => 'required',
            'status' => 'required',
            'tip_prioritate' => 'required',
            'stadiu' => 'required',
            'detalii' => 'required'
        );
        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) 
        {
            if (!empty(($ideie))) 
            {
                return redirect(route('registrul-idei::edit', ['id' => $ideie->id]))
                        ->withErrors($validator->errors())
                        ->withInput();
            } 
            else 
            {
                return redirect(route('registrul-idei::create'))
                        ->withErrors($validator->errors())
                        ->withInput();
            }
        }
    }
}