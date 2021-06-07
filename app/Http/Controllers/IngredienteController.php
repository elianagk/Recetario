<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\StoreIngredienteRequest;
use App\Models\Ingrediente;
use App\Models\Receta;
use App\Models\RecetaIngrediente;

class IngredienteController extends Controller
{
    //Se encarga de mostrar todos los ingredientes
    public function index(){

        $ingredientes = Ingrediente::all();
        return view('ingrediente.index')->with('ingredientes', $ingredientes);

    }
    public function create(){
        return view('ingrediente.create');
    }
    
    public function store (StoreIngredienteRequest $request){

        Ingrediente::create($request->all());
        return redirect()->route('ingrediente.index');
       
    }

    //Devuelve la vista de todas las recetas asociadas a un ingrediente
    public function show($id){
    
        $recetas = array();
        $recetasIng = RecetaIngrediente::where('id_ingrediente', '=', $id)->get();
        foreach ($recetasIng as $recetaIng){
                $recetas[] = Receta::findOrFail($recetaIng->id_receta);
                
         }
       
       $ingredientes = Ingrediente::findOrFail($id);
       return view('ingrediente.show')->with(['recetas'=> $recetas,'ingredientes'=> $ingredientes]);

    }
    
    public function edit($id){
        $ingrediente = Ingrediente::findOrFail($id);
        return view('ingrediente.edit')->with('ingrediente', $ingrediente);
    }

    public function delete($id){
        $ingrediente = Ingrediente::findOrFail($id);
        $ingrediente->delete();
        return redirect()->route('ingrediente.index');

    }


    public function update (StoreIngredienteRequest $request, $id){
        $ingrediente = Ingrediente::findOrFail($id);
        $ingrediente->update($request->all());
        return redirect()->route('ingrediente.index');
    }

   



    

    







}