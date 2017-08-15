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
use App\Models\ObiectivProiect;
use App\Models\ConstrangereProiect;
use App\Models\ModFinantare;

use App\Models\SolutieProiect;
use App\Models\JustificareSolutieProiect;
use App\Models\IndicatorMonitorizare;
use App\Models\DepartamentSuportProiect;
use App\Models\EchipaProiect;
use App\Models\LivrabilaProiect;
use App\Models\ProcesAferentProiectului;

use App\Models\PachetDeLucru;
use App\Models\PachetDeLucruDetalii;




class RegistrulProiecteController extends Controller
{   
    public function index(){ 
        return view('registrul_general.registrul_proiecte.index', [
            'proiecte' => Proiect::with('dateGenerale')->with('obiective')->with('constringeri')->with('finantari')->with('solutii')->with('justificariSolutii')->with('indicatoriMonitorizare')->with('departamenteSuport')->with('echipaProiect')->with('livrabileProiect')->with('proceseAferenteProiectului')->with(['pacheteDeLucru.detaliiPachet'])->get()
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
            return redirect()->route('proiecte::list')->with('alert-success', 'Proiect salvat cu succes');
        } 
        else
        {
            return redirect()->route('proiecte::list')->with('alert-danger', 'Eroare salvare proiect');
        }
    }
 
    public function edit(Proiect $proiect) 
    {   
        if (is_null($proiect)) { return redirect(route('proiecte::list'))->with('alert-danger', 'Proiectul nu exista'); }

        return view('registrul_general.registrul_proiecte.add_edit', [
            'proiect' => $proiect, 
            'segmente_de_asociere' => Tools::segmente_de_asociere(),
            'tipuri_inovare' => Tools::tipuri_inovare(),
            'validare_pt_dezvoltare' => Tools::validare_pt_dezvoltare(),
            'prioritate_de_dezvoltare' => Tools::prioritate_de_dezvoltare(),
            'stadiul_inceperii' => Tools::stadiul_inceperii(),
            'form_title' => 'Editare proiect',
            'form_route' => route('proiecte::update', ['id' => $proiect->id])
        ]);
    }
 
    public function update(Request $request, Proiect $proiect) 
    {
    	$validation = $this->validateRequest($request, $proiect);
        if ($validation) { return $validation; }

        if (is_null($proiect)) { return redirect(route('proiecte::list'))->with('alert-danger', 'Proiectul nu exista'); }

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
            return redirect()->route('proiecte::list')->with('alert-success', 'Proiect salvat cu succes');
        } 
        else
        {
            return redirect()->route('proiecte::list')->with('alert-danger', 'Eroare salvare proiect');
        }
    }

    public function delete(Proiect $proiect) 
    {       
        if (is_null($proiect)) { return redirect()->route('proiecte::list')->with('alert-danger', 'Proiectul nu exista'); }

        if ($proiect->delete()) 
        {
            return redirect()->route('proiecte::list')->with('alert-success', 'Proiect eliminat cu succes');
        } 
        else
        {
            return redirect()->route('proiecte::list')->with('alert-danger', 'Eroare eliminare proiect');
        }
    }




     public function detaliiProiect(Request $request, Proiect $proiect){
        return view('registrul_general.registrul_proiecte.detalii.index', [
            'proiect' => $proiect
        ]);
    }

    public function createDetalii(Request $request, Proiect $proiect){

        if (is_null($proiect)) { return redirect(route('proiecte::list'))->with('alert-danger', 'Proiectul nu exista'); }
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
            

        if(InitProiect::where('id', $name)->first()){
            InitProiect::where('id', $name)->update(['nume' => $value]);
        }else{
            $init_pr = new InitProiect();
            $init_pr->proiect_id = $pk;
            $init_pr->nume = $value;
            $init_pr->save();
        }
    }

    public function initProjectObiective(){
        $pk = Input::get('pk');
        $name = Input::get('name');
        $value = Input::get('value');
            

        if(ObiectivProiect::where('id', $name)->first()){
            ObiectivProiect::where('id', $name)->update(['nume' => $value]);
        }else{
            $init_pr = new ObiectivProiect();
            $init_pr->proiect_id = $pk;
            $init_pr->nume = $value;
            $init_pr->save();
        }   
    }

    public function initProjectConstrangeri(){
        $pk = Input::get('pk');
        $name = Input::get('name');
        $value = Input::get('value');
            

        if(ConstrangereProiect::where('id', $name)->first()){
            ConstrangereProiect::where('id', $name)->update(['nume' => $value]);
        }else{
            $init_pr = new ConstrangereProiect();
            $init_pr->proiect_id = $pk;
            $init_pr->nume = $value;
            $init_pr->save();
        }   
    }

    public function initProjectFinantari(){
        $pk = Input::get('pk');
        $name = Input::get('name');
        $value = Input::get('value');
            

        if(ModFinantare::where('id', $name)->first()){
            ModFinantare::where('id', $name)->update(['nume' => $value]);
        }else{
            $init_pr = new ModFinantare();
            $init_pr->proiect_id = $pk;
            $init_pr->nume = $value;
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

    public function initProjectScop()
    {   
        $pk = Input::get('pk');
        $name = Input::get('name');
        $value = Input::get('value');
        
        Proiect::where('id', $pk)->update(['scop_proiect' => $value]);
    }
    

    // desing solutii proiect
     public function initProjectSolutii(){
        $pk = Input::get('pk');
        $name = Input::get('name');
        $value = Input::get('value');
            

        if(SolutieProiect::where('id', $name)->first()){
            SolutieProiect::where('id', $name)->update(['nume' => $value]);
        }else{
            $init_pr = new SolutieProiect();
            $init_pr->proiect_id = $pk;
            $init_pr->nume = $value;
            $init_pr->save();
        }   
    }

     public function initProjectJustificariSolutii(){
        $pk = Input::get('pk');
        $name = Input::get('name');
        $value = Input::get('value');
            

        if(JustificareSolutieProiect::where('id', $name)->first()){
            JustificareSolutieProiect::where('id', $name)->update(['nume' => $value]);
        }else{
            $init_pr = new JustificareSolutieProiect();
            $init_pr->proiect_id = $pk;
            $init_pr->nume = $value;
            $init_pr->save();
        }   
    } 

    public function indicatoriMonitorizare(){

        $pk = Input::get('pk');
        $name = Input::get('name');
        $value = Input::get('value');
        $id = Input::get('proiect_id');



        if (IndicatorMonitorizare::where('str_indicator', $pk)->first()) {
            IndicatorMonitorizare::where('str_indicator', $pk)->update([$name => $value]);
        }else{
            $proces = new IndicatorMonitorizare;
            $proces->str_indicator = $pk;
            $proces->$name = $value;
            $proces->proiect_id = $id;
            $proces->save(); 
        } 
    }

    public function departamenteSuport(){

        $pk = Input::get('pk');
        $name = Input::get('name');
        $value = Input::get('value');
        $id = Input::get('proiect_id');

        if (DepartamentSuportProiect::where('str_indicator', $pk)->first()) {
            DepartamentSuportProiect::where('str_indicator', $pk)->update([$name => $value]);
        }else{
            $proces = new DepartamentSuportProiect;
            $proces->str_indicator = $pk;
            $proces->$name = $value;
            $proces->proiect_id = $id;
            $proces->save(); 
        } 
    }

    public function echipaProiect(){
        $pk = Input::get('pk');
        $name = Input::get('name');
        $value = Input::get('value');
            

        if(EchipaProiect::where('id', $name)->first()){
            EchipaProiect::where('id', $name)->update(['nume' => $value]);
        }else{
            $init_pr = new EchipaProiect();
            $init_pr->proiect_id = $pk;
            $init_pr->nume = $value;
            $init_pr->save();
        }   
    }

     public function livrabileProiect(){

        $pk = Input::get('pk');
        $name = Input::get('name');
        $value = Input::get('value');
        $id = Input::get('proiect_id');

        if (LivrabilaProiect::where('str_indicator', $pk)->first()) {
            LivrabilaProiect::where('str_indicator', $pk)->update([$name => $value]);
        }else{
            $proces = new LivrabilaProiect;
            $proces->str_indicator = $pk;
            $proces->$name = $value;
            $proces->proiect_id = $id;
            $proces->save(); 
        } 
    }

    public function proceseAferenteProiectului(){
        $pk = Input::get('pk');
        $name = Input::get('name');
        $value = Input::get('value');
        $id = Input::get('proiect_id');

        if (ProcesAferentProiectului::where('str_indicator', $pk)->first()) {
            ProcesAferentProiectului::where('str_indicator', $pk)->update([$name => $value]);
        }else{
            $proces = new ProcesAferentProiectului;
            $proces->str_indicator = $pk;
            $proces->$name = $value;
            $proces->proiect_id = $id;
            $proces->save(); 
        } 
    }
    
    

    public function pacheteDeLucru(){
        $pk = Input::get('pk');
        $name = Input::get('name');
        $value = Input::get('value');
            

        if(PachetDeLucru::where('id', $name)->first()){
            PachetDeLucru::where('id', $name)->update(['nume' => $value]);
        }else{
            $init_pr = new PachetDeLucru();
            $init_pr->proiect_id = $pk;
            $init_pr->nume = $value;
            $init_pr->save();
        }   
    }


    

    public function pacheteDeLucruDetalii(){
        $pk = Input::get('pk');
        $name = Input::get('name');
        $value = Input::get('value');
        $id = Input::get('pachet_de_lucru_id');

        if (PachetDeLucruDetalii::where('str_indicator', $pk)->first()) {
            PachetDeLucruDetalii::where('str_indicator', $pk)->update([$name => $value]);
        }else{
            $proces = new PachetDeLucruDetalii;
            $proces->str_indicator = $pk;
            $proces->$name = $value;
            $proces->pachet_de_lucru_id = $id;
            $proces->save(); 
        } 
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