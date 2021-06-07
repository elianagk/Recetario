<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\StoreRIRequest;
use Illuminate\Http\Request;
use App\Models\RecetaIngrediente;
use App\Models\Receta;
use App\Models\Ingrediente;
use Illuminate\Support\Facades\DB;

class RecetaIngredienteController extends Controller
{
   
    //El form para los ingredientes esta en la vista receta.index 
    //Q se llama en el RecetaController

    public function create($id){
        $receta=Receta::findOrFail($id);
        $ingredientes=Ingrediente::all();
       
        return view('recetaIngrediente.create')->with(['receta'=> $receta,'ingredientes'=> $ingredientes]);
    }

    //Se gurdan los ingredientes de una receta
    public function store (StoreRIRequest $request){
        $nombre_ingrediente= $request->nombre_ingrediente;
        $id = $request->id_receta;
        $ingrediente = Ingrediente::firstOrCreate([
            'nombre' => $nombre_ingrediente
        ]);
        
       
        
        RecetaIngrediente::create([
            'id_ingrediente' => $ingrediente->id_ingrediente,
            'id_receta'=> $id,
            'cantidad' => $request->input('cantidad')
        ]);
        
       
        return redirect()->route('recetaIngrediente.create',['id'=> $id]);
    }

    public function edit($id){
        $receta = Receta::findOrFail($id);
        $ingredientes = array();
        $cantidades = array();
        $recetaIngre = RecetaIngrediente::where('id_receta', '=', $id)->get();
        if($recetaIngre != null){
        foreach ($recetaIngre as $recetaIng){
            $ingred = Ingrediente::findOrFail($recetaIng->id_ingrediente);
            $ingredientes[] = $ingred;
            $nombre = $ingred->nombre;
            $cantidades[$nombre] = $recetaIng->cantidad;
        }
        }



        return view('recetaIngrediente.edit')->with(['receta'=>$receta, 'ingredientes'=>$ingredientes, 'cantidades'=>$cantidades]);
    }

    
    //Update de los ingredientes de una receta
    public function update (StoreRIRequest $request, $idIngredienteViejo){
        $nombre_ingrediente= $request->input('nombre_ingrediente');
        $id = $request->input('id_receta');
        $ingrediente = Ingrediente::firstOrCreate([
            'nombre' => $nombre_ingrediente
        ]);
        if($idIngredienteViejo == $ingrediente->id_ingrediente){
            RecetaIngrediente::where('id_receta', '=', $id)->where('id_ingrediente', '=', $idIngredienteViejo)->update(['cantidad' => $request->input('cantidad')]);
        }
        else{
            RecetaIngrediente::where('id_receta', '=', $id)->where('id_ingrediente', '=', $idIngredienteViejo)->update(['id_ingrediente'=> $ingrediente->id_ingrediente,'cantidad' => $request->input('cantidad')]);
        }
        return $this->edit($id);

        
    }

    public function delete($idReceta){
        $receta = Receta::findOrFail($idReceta);
        $ingredientes = array();
        $cantidades = array();
        $recetaIngre = RecetaIngrediente::where('id_receta', '=', $idReceta)->get();
        foreach ($recetaIngre as $recetaIng){
            $ingred = Ingrediente::findOrFail($recetaIng->id_ingrediente);
            $ingredientes[] = $ingred;
            $nombre = $ingred->nombre;
            $cantidades[$nombre] = $recetaIng->cantidad;
        }



        return view('recetaIngrediente.delete')->with(['receta'=>$receta, 'ingredientes'=>$ingredientes, 'cantidades'=>$cantidades]);
    }
   
    public function deleted(StoreRIRequest $request){
        $nombre_ingrediente= $request->input('nombre_ingrediente');
        $id = $request->input('id_receta');
        $ingrediente = Ingrediente::firstOrCreate([
            'nombre' => $nombre_ingrediente
        ]);
       $recetasIng = RecetaIngrediente::where('id_receta', '=', $id)->where('id_ingrediente', '=', $ingrediente->id_ingrediente);
       
       $recetasIng->delete();
        
    
        return redirect()->route('recetaIngrediente.edit', ['id'=>$request->id_receta]);

    }
    
   






}
