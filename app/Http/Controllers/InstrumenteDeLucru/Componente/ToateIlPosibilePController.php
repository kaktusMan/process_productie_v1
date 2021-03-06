<?php

namespace App\Http\Controllers\InstrumenteDeLucru\Componente;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Validator;
use App\Models\InstrumenteDeLucru\Componente\ModFolosinta;
use App\Models\InstrumenteDeLucru\Componente\IlPosibil;

class ToateIlPosibileController extends Controller
{
     
    public function index(){ 
        return view('instrumente_de_lucru.~componente.il_posibile.index', [
            'il_posibile' => IlPosibil::with('modFolosinta')->get()
        ]);
    }

    public function create() 
    {        
        return view('instrumente_de_lucru.~componente.il_posibile.add_edit', [
            'il_posibil' => new IlPosibil(),
            'form_title' => 'Creare instrument de lucru',
            'moduri_folosinta' => ModFolosinta::getOptionsArray(),
            'form_route' => route('il-posibile::store')
        ]);
    } 
 
    public function store(Request $request) 
    {     
        $validation = $this->validateRequest($request);
        if ($validation) { return $validation; }

        $il_posibil = new IlPosibil();

        $il_posibil->nume = $request->input('nume');
        $il_posibil->furnizor = $request->input('furnizor');
        $il_posibil->marca = $request->input('marca');
        $il_posibil->modFolosinta()->associate($request->input('id_mod_folosinta'));

        if ($il_posibil->save()) 
        {   
            return redirect()->route('il-posibile::list')->with('alert-success', 'Il salvat cu succes');
        } 
        else
        {
            return redirect()->route('il-posibile::list')->with('alert-danger', 'Eroare salvare il');
        }
    }
 
    public function edit(IlPosibil $il_posibil) 
    {   
        if (is_null($il_posibil)) { return redirect(route('il-posibile::list'))->with('alert-danger', 'Il nu exista'); }

        return view('instrumente_de_lucru.~componente.il_posibile.add_edit', [
            'il_posibil' => $il_posibil, 
            'form_title' => 'Editare instrument de lucru',
            'moduri_folosinta' => ModFolosinta::getOptionsArray(),
            'form_route' => route('il-posibile::update', ['id' => $il_posibil->id])
        ]);
    }
 
    public function update(Request $request, IlPosibil $il_posibil) 
    {       
        $validation = $this->validateRequest($request, $il_posibil);
        if ($validation) { return $validation; }

        if (is_null($il_posibil)) { return redirect(route('il-posibile::list'))->with('alert-danger', 'Il nu exista'); }

        $il_posibil->nume = $request->input('nume');
        $il_posibil->furnizor = $request->input('furnizor');
        $il_posibil->marca = $request->input('marca');
        $il_posibil->modFolosinta()->associate($request->input('id_mod_folosinta'));

        if ($il_posibil->save()) 
        {   
            return redirect()->route('il-posibile::list')->with('alert-success', 'Il salvat cu succes');
        } 
        else
        {
            return redirect()->route('il-posibile::list')->with('alert-danger', 'Eroare salvare il');
        }
    }

    public function delete(IlPosibil $il_posibil) 
    {       
        if (is_null($il_posibil)) { return redirect()->route('il-posibile::list')->with('alert-danger', 'Il nu exista'); }

        if ($il_posibil->delete()) 
        {
            return redirect()->route('il-posibile::list')->with('alert-success', 'Il eliminat cu succes');
        } 
        else
        {
            return redirect()->route('il-posibile::list')->with('alert-danger', 'Eroare eliminare il');
        }
    }

    protected function validateRequest($request, $il_posibil = null) 
    {   
        $rules = [
            'nume' => 'required',
            'furnizor' => 'required',
            'marca' => 'required',
            'id_mod_folosinta' => 'required'
        ];
        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) 
        {
            if (!empty(($il_posibil))) 
            {
                return redirect(route('il-posibile::edit', ['id' => $il_posibil->id]))
                        ->withErrors($validator->errors())
                        ->withInput();
            } 
            else 
            {
                return redirect(route('il-posibile::create'))
                        ->withErrors($validator->errors())
                        ->withInput();
            }
        }
    }
}