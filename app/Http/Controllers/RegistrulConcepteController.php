<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Validator;
use App\Models\Tools;
use App\Models\Concept;

class RegistrulConcepteController extends Controller
{   
    public function index(){ 
        return view('registrul_general.registrul_concepte.index', [
            'concepte' => Concept::all()
        ]);
    }

    public function create() 
    {        
        return view('registrul_general.registrul_concepte.add_edit', [
            'concept' => new Concept(),
            'segmente_de_asociere' => Tools::segmente_de_asociere(),
            'tipuri_inovare' => Tools::tipuri_inovare(),
            'validare_pt_dezvoltare' => Tools::validare_pt_dezvoltare(),
            'prioritate_de_dezvoltare' => Tools::prioritate_de_dezvoltare(),
            'stadiul_inceperii' => Tools::stadiul_inceperii(),
            'form_title' => 'Creare concept',
            'form_route' => route('registrul-concepte::store')
        ]);
    }
 
    public function store(Request $request) 
    {    
        $validation = $this->validateRequest($request);
        if ($validation) { return $validation; }

        $concept = new Concept();

        $concept->data_introducerii = $request->input('data_introducerii');
        $concept->segment_asociat = $request->input('segment_asociat'); 
        $concept->cod_concept = $request->input('cod_concept'); 
        $concept->formare_concept = $request->input('formare_concept');
        $concept->promotor_concept = $request->input('promotor_concept');
        $concept->tip_inovare = $request->input('tip_inovare'); 
        $concept->status = $request->input('status'); 
        $concept->tip_prioritate = $request->input('tip_prioritate'); 
        $concept->stadiu = $request->input('stadiu'); 
        $concept->detalii = $request->input('detalii'); 


        if ($concept->save()) 
        {   
            return redirect()->route('registrul-concepte::list')->with('alert-success', 'Concept salvata cu succes');
        } 
        else
        {
            return redirect()->route('registrul-concepte::list')->with('alert-danger', 'Eroare salvare concept');
        }
    }
 
    public function edit(Concept $concept) 
    {   
        if (is_null($concept)) { return redirect(route('registrul-concepte::list'))->with('alert-danger', 'Conceptul nu exista'); }

        return view('registrul_general.registrul_concepte.add_edit', [
            'concept' => $concept, 
            'segmente_de_asociere' => Tools::segmente_de_asociere(),
            'tipuri_inovare' => Tools::tipuri_inovare(),
            'validare_pt_dezvoltare' => Tools::validare_pt_dezvoltare(),
            'prioritate_de_dezvoltare' => Tools::prioritate_de_dezvoltare(),
            'stadiul_inceperii' => Tools::stadiul_inceperii(),
            'form_title' => 'Editare concept',
            'form_route' => route('registrul-concepte::update', ['id' => $concept->id])
        ]);
    }
 
    public function update(Request $request, Concept $concept) 
    {
        $validation = $this->validateRequest($request, $concept);
        if ($validation) { return $validation; }

        if (is_null($concept)) { return redirect(route('registrul-concepte::list'))->with('alert-danger', 'Conceptul nu exista'); }

        $concept->data_introducerii = $request->input('data_introducerii');
        $concept->segment_asociat = $request->input('segment_asociat'); 
        $concept->cod_concept = $request->input('cod_concept'); 
        $concept->formare_concept = $request->input('formare_concept');
        $concept->promotor_concept = $request->input('promotor_concept');
        $concept->tip_inovare = $request->input('tip_inovare'); 
        $concept->status = $request->input('status'); 
        $concept->tip_prioritate = $request->input('tip_prioritate'); 
        $concept->stadiu = $request->input('stadiu'); 
        $concept->detalii = $request->input('detalii'); 

        if ($concept->save()) 
        {   
            return redirect()->route('registrul-concepte::list')->with('alert-success', 'Conceptul salvat cu succes');
        } 
        else
        {
            return redirect()->route('registrul-concepte::list')->with('alert-danger', 'Eroare salvare oncept');
        }
    }



    public function detaliiConcept(Request $request, Concept $concept){
        return view('registrul_general.registrul_concepte.detalii.index', [
            'concept' => $concept
        ]);
    }

    public function createDetalii(Request $request, Concept $concept){

        if (is_null($concept)) { return redirect(route('registrul-concepte::list'))->with('alert-danger', 'Conceptul nu exista'); }
        return view('registrul_general.registrul_concepte.detalii.add_edit', [
            'concept' => $concept, 
            'segmente_de_asociere' => Tools::segmente_de_asociere(),
            'tipuri_inovare' => Tools::tipuri_inovare(),
            'validare_pt_dezvoltare' => Tools::validare_pt_dezvoltare(),
            'prioritate_de_dezvoltare' => Tools::prioritate_de_dezvoltare(),
            'stadiul_inceperii' => Tools::stadiul_inceperii(),
            'form_title' => 'Prezentarea unui concept bazat pe o idee propusa spre dezvoltare',
            'form_route' => route('registrul-concepte::store-detalii', ['id' => $concept->id])
        ]);

    }

    public function storeDetalii(Request $request,  Concept $concept)
    {    
        $concept->ideea_de_baza = $request->input('ideea_de_baza');
        $concept->avantajele_aduse = $request->input('avantajele_aduse');
        $concept->impact = $request->input('impact');
        $concept->particularitati_concept = $request->input('particularitati_concept');
        $concept->infrastructura = $request->input('infrastructura');
        $concept->estimare_buget = $request->input('estimare_buget');
        $concept->potentialii_clienti = $request->input('potentialii_clienti');
        $concept->update();

        return redirect()->route('registrul-concepte::detalii', ['id' => $concept->id])->with('alert-success', 'Detalii concept salvate cu succes');
    }

    public function delete(Concept $concept) 
    {       
        if (is_null($concept)) { return redirect()->route('registrul-concepte::list')->with('alert-danger', 'Conceptul nu exista'); }

        if ($concept->delete()) 
        {
            return redirect()->route('registrul-concepte::list')->with('alert-success', 'Concept eliminat cu succes');
        } 
        else
        {
            return redirect()->route('registrul-concepte::list')->with('alert-danger', 'Eroare eliminare concept');
        }
    }

    protected function validateRequest($request, $concept = null) 
    {   
        $rules  = array(
            'data_introducerii' => 'required',
            'segment_asociat' => 'required',
            'cod_concept' => 'required',
            'formare_concept' => 'required',
            'promotor_concept' => 'required',
            'tip_inovare' => 'required',
            'status' => 'required',
            'tip_prioritate' => 'required',
            'stadiu' => 'required',
            'detalii' => 'required'
        );
        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) 
        {
            if (!empty(($concept))) 
            {
                return redirect(route('registrul-concepte::edit', ['id' => $concept->id]))
                        ->withErrors($validator->errors())
                        ->withInput();
            } 
            else 
            {
                return redirect(route('registrul-concepte::create'))
                        ->withErrors($validator->errors())
                        ->withInput();
            }
        }
    }
}