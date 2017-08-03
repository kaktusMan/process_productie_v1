<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Validator;
use Input;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Tools;
use App\Models\Proiect;
use App\Models\InitProiect;

class RegistrulProiecteController extends Controller
{   
    public function index(){ 
        return view('registrul_general.registrul_proiecte.index', [
            'proiecte' => Proiect::all()
        ]);
    }

    public function create() 
    {        
        return view('registrul_general.registrul_proiecte.add_edit', [
            'proiect' => new Proiect(),
            'segmente_de_asociere' => Tools::segmente_de_asociere(),
            'tipuri_inovare' => Tools::tipuri_inovare(),
            'validare_pt_dezvoltare' => Tools::validare_pt_dezvoltare(),
            'prioritate_de_dezvoltare' => Tools::prioritate_de_dezvoltare(),
            'stadiul_inceperii' => Tools::stadiul_inceperii(),
            'form_title' => 'Creare proiect',
            'form_route' => route('proiecte::store')
        ]);
    }
 
    public function store(Request $request) 
    {    
    	$validation = $this->validateRequest($request);
        if ($validation) { return $validation; }

        $proiect = new Proiect(); 

        $proiect->data_adaugarii = $request->input('data_adaugarii');
        $proiect->nume = $request->input('nume');
        $proiect->cod = $request->input('cod');
        $proiect->segment_adresare = $request->input('segment_adresare');
        $proiect->board = $request->input('board');
        $proiect->executiv = $request->input('executiv');
        $proiect->p_m = $request->input('p_m');
        $proiect->tip_proiect = $request->input('tip_proiect');
        $proiect->validare = $request->input('validare');
        $proiect->prioritate = $request->input('prioritate');
        $proiect->stadiu = $request->input('stadiu');
        $proiect->detalii = $request->input('detalii');
        $proiect->business_unit = $request->input('business_unit');
        $proiect->societate_implementatoare = $request->input('societate_implementatoare');
        $proiect->termen_inceput = $request->input('termen_inceput');
        $proiect->testare_estimata = $request->input('testare_estimata');
        $proiect->testare_reala = $request->input('testare_reala');
        $proiect->intr_in_prod_partiala_estimata = $request->input('intr_in_prod_partiala_estimata');
        $proiect->intr_in_prod_partiala_reala = $request->input('intr_in_prod_partiala_reala');
        $proiect->intr_in_prod_completa_estimata = $request->input('intr_in_prod_completa_estimata');
        $proiect->intr_in_prod_completa_reala = $request->input('intr_in_prod_completa_reala');
        $proiect->buget_estimat = $request->input('buget_estimat');

        if ($proiect->save()) 
        {   
            return redirect()->route('proiecte::list')->with('alert-success', 'Idee salvata cu succes');
        } 
        else
        {
            return redirect()->route('proiecte::list')->with('alert-danger', 'Eroare salvare idee');
        }
    }
 
    public function edit(Proiect $proiect) 
    {   
        if (is_null($proiect)) { return redirect(route('proiecte::list'))->with('alert-danger', 'Ideea nu exista'); }

        return view('registrul_general.registrul_proiecte.add_edit', [
            'proiect' => $proiect, 
            'segmente_de_asociere' => Tools::segmente_de_asociere(),
            'tipuri_inovare' => Tools::tipuri_inovare(),
            'validare_pt_dezvoltare' => Tools::validare_pt_dezvoltare(),
            'prioritate_de_dezvoltare' => Tools::prioritate_de_dezvoltare(),
            'stadiul_inceperii' => Tools::stadiul_inceperii(),
            'form_title' => 'Editare idee',
            'form_route' => route('proiecte::update', ['id' => $proiect->id])
        ]);
    }
 
    public function update(Request $request, Proiect $proiect) 
    {
    	$validation = $this->validateRequest($request, $proiect);
        if ($validation) { return $validation; }

        if (is_null($proiect)) { return redirect(route('proiecte::list'))->with('alert-danger', 'Ideea nu exista'); }

        $proiect->data_adaugarii = $request->input('data_adaugarii');
        $proiect->nume = $request->input('nume');
        $proiect->cod = $request->input('cod');
        $proiect->segment_adresare = $request->input('segment_adresare');
        $proiect->board = $request->input('board');
        $proiect->executiv = $request->input('executiv');
        $proiect->p_m = $request->input('p_m');
        $proiect->tip_proiect = $request->input('tip_proiect');
        $proiect->validare = $request->input('validare');
        $proiect->prioritate = $request->input('prioritate');
        $proiect->stadiu = $request->input('stadiu');
        $proiect->detalii = $request->input('detalii');
        $proiect->business_unit = $request->input('business_unit');
        $proiect->societate_implementatoare = $request->input('societate_implementatoare');
        $proiect->termen_inceput = $request->input('termen_inceput');
        $proiect->testare_estimata = $request->input('testare_estimata');
        $proiect->testare_reala = $request->input('testare_reala');
        $proiect->intr_in_prod_partiala_estimata = $request->input('intr_in_prod_partiala_estimata');
        $proiect->intr_in_prod_partiala_reala = $request->input('intr_in_prod_partiala_reala');
        $proiect->intr_in_prod_completa_estimata = $request->input('intr_in_prod_completa_estimata');
        $proiect->intr_in_prod_completa_reala = $request->input('intr_in_prod_completa_reala');
        $proiect->buget_estimat = $request->input('buget_estimat'); 

        if ($proiect->save()) 
        {   
            return redirect()->route('proiecte::list')->with('alert-success', 'Ideea salvata cu succes');
        } 
        else
        {
            return redirect()->route('proiecte::list')->with('alert-danger', 'Eroare salvare idee');
        }
    }

    public function delete(Proiect $proiect) 
    {       
        if (is_null($proiect)) { return redirect()->route('proiecte::list')->with('alert-danger', 'Ideea nu exista'); }

        if ($proiect->delete()) 
        {
            return redirect()->route('proiecte::list')->with('alert-success', 'Ideea eliminata cu succes');
        } 
        else
        {
            return redirect()->route('proiecte::list')->with('alert-danger', 'Eroare eliminare idee');
        }
    }




     public function detaliiProiect(Request $request, Proiect $proiect){
        return view('registrul_general.registrul_proiecte.detalii.index', [
            'proiect' => $proiect
        ]);
    }

    public function createDetalii(Request $request, Proiect $proiect){

        if (is_null($proiect)) { return redirect(route('proiecte::list'))->with('alert-danger', 'Conceptul nu exista'); }
        return view('registrul_general.registrul_proiecte.detalii.add_edit', [
            'proiect' => $proiect, 
            'segmente_de_asociere' => Tools::segmente_de_asociere(),
            'tipuri_inovare' => Tools::tipuri_inovare(),
            'validare_pt_dezvoltare' => Tools::validare_pt_dezvoltare(),
            'prioritate_de_dezvoltare' => Tools::prioritate_de_dezvoltare(),
            'stadiul_inceperii' => Tools::stadiul_inceperii(),
            'form_title' => 'Prezentarea unui concept bazat pe o idee propusa spre dezvoltare',
            'form_route' => route('proiecte::store-detalii', ['id' => $proiect->id])
        ]);

    }

    public function initProjectDateGenerale()
    {   

        $pk = Input::get('pk');
        $name = Input::get('name');
        $value = Input::get('value');
        
        if(InitProiect::find($pk)){
            InitProiect::where('id', $pk)->update([$name => $value]);
        }else{
            $init_pr = new InitProiect();
            $init_pr->proiect_id = $pk;
            $init_pr->name = $value;
            $init_pr->save();
        }
    }

    public function setDataInitierii()
    {   
        $pk = Input::get('pk');
        $name = Input::get('name');
        $value = Input::get('value');
        
        Proiect::where('id', $pk)->update(['data_initierii' => $value]);
    }

    public function storeDetalii(Request $request,  Proiect $proiect)
    {    
        // $concept->ideea_de_baza = $request->input('ideea_de_baza');
        // $concept->avantajele_aduse = $request->input('avantajele_aduse');
        // $concept->impact = $request->input('impact');
        // $concept->particularitati_concept = $request->input('particularitati_concept');
        // $concept->infrastructura = $request->input('infrastructura');
        // $concept->estimare_buget = $request->input('estimare_buget');
        // $concept->potentialii_clienti = $request->input('potentialii_clienti');
        // $concept->update();

        return redirect()->route('proiecte::detalii', ['id' => $proiect->id])->with('alert-success', 'Detalii concept salvate cu succes');
    }







    protected function validateRequest($request, $proiect = null) 
    {	
    	$rules  = array(
            'data_adaugarii'  => 'required',
            'nume'  => 'required',
            'cod'  => 'required',
            'segment_adresare'  => 'required',
            'board'  => 'required',
            'executiv'  => 'required',
            'p_m'  => 'required',
            'tip_proiect'  => 'required',
            'validare'  => 'required',
            'prioritate'  => 'required',
            'stadiu'  => 'required',
            'detalii'  => 'required',
            'business_unit'  => 'required',
            'societate_implementatoare'  => 'required',
            'termen_inceput'  => 'required',
            'testare_estimata'  => 'required',
            'testare_reala'  => 'required',
            'intr_in_prod_partiala_estimata'  => 'required',
            'intr_in_prod_partiala_reala'  => 'required',
            'intr_in_prod_completa_estimata'  => 'required',
            'intr_in_prod_completa_reala'  => 'required',
            'buget_estimat'  => 'required|numeric'
        );

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) 
        {
            if (!empty(($proiect))) 
            {
                return redirect(route('proiecte::edit', ['id' => $proiect->id]))
                        ->withErrors($validator->errors())
                        ->withInput();
            } 
            else 
            {
                return redirect(route('proiecte::create'))
                        ->withErrors($validator->errors())
                        ->withInput();
            }
        }
    }
}