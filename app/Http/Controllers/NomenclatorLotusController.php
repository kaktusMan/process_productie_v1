<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Validator;
use Input;
use App\Models\NomenclatorLotus\Grupa;
use App\Models\NomenclatorLotus\ModelProd;
use App\Models\NomenclatorLotus\Familia;

class NomenclatorLotusController extends Controller
{   
    public function index(){ 
    	// return Grupa::with(['familii', 'familii.modele'])->get();
        return view('nomenclator_lotus.index',[
        	'grupe' => Grupa::with(['familii', 'familii.modele'])->get()
    	]);
    }

	public function create() 
    {        
        return view('nomenclator_lotus.add_edit', [
            'grup' => new Grupa(), 
            'form_title' => 'Creare grup',
            'form_route' => route('nomenclator-lotus::store')
        ]);
    }
 
    public function store(Request $request) 
    {    
    	$validation = $this->validateRequest($request);
        if ($validation) { return $validation; }

        $grup = new Grupa();

        $grup->nume = $request->input('nume'); 


        if ($grup->save()) 
        {   
            return redirect()->route('nomenclator-lotus::list')->with('alert-success', 'Grup salvat cu succes');
        } 
        else
        {
            return redirect()->route('nomenclator-lotus::list')->with('alert-danger', 'Eroare salvare grup');
        }
    }

	public function ActualizeazaGrupuri(){
		$pk = Input::get('pk');
        $name = Input::get('name');
        $value = Input::get('value');

        Grupa::where('id', $pk)->update([$name => $value]);
	}

	public function ActualizeazaFamilii(){
		$pk = Input::get('pk');
        $name = Input::get('name');
        $value = Input::get('value');
        $id = Input::get('grup_id');

        Familia::where('id', $pk)->update([$name => $value]);

        if (Familia::where('id', $pk)->first()) {
            Familia::where('id', $pk)->update([$name => $value]);
        }else{
            $proces = new Familia;
            $proces->$name = $value;
            $proces->grupa_id = $id;
            $proces->save(); 
        }
	}

	public function ActualizeazaModele(){
		$pk = Input::get('pk');
        $name = Input::get('name');
        $value = Input::get('value');
        $id = Input::get('familie_id');

        ModelProd::where('id', $pk)->update([$name => $value]);

        if (ModelProd::where('id', $pk)->first()) {
            ModelProd::where('id', $pk)->update([$name => $value]);
        }else{
            $proces = new ModelProd;
            $proces->$name = $value;
            $proces->familia_id = $id;
            $proces->save(); 
        }
	}

	public function deleteGrup(){
		$id = Input::get('id'); 
        Grupa::where('id', $id)->delete();
        Familia::where('id', $id)->delete();
        return "OK";
	}
	public function deleteFamilie(){
		$id = Input::get('id'); 
        Familia::where('id', $id)->delete();
        return "OK";
	}
	public function deleteModel(){
		$id = Input::get('id'); 
        ModelProd::where('id', $id)->delete();
        return "OK";
	}

	






	
    protected function validateRequest($request, $grup = null) 
    {   
        $rules  = array(
            'nume' => 'required|min:3'
        );
        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) 
        {
            if (!empty(($grup))) 
            {
                return redirect(route('nomenclator-lotus::edit', ['id' => $grup->id]))
                        ->withErrors($validator->errors())
                        ->withInput();
            } 
            else 
            {
                return redirect(route('nomenclator-lotus::create'))
                        ->withErrors($validator->errors())
                        ->withInput();
            }
        }
    }
}
