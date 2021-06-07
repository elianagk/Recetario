<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\StoreRecetaRequest;
use App\Models\Receta;
use App\Models\Categoria;
use App\Models\RecetaIngrediente;
use App\Models\Ingrediente;
use App\Models\RecetaCategoria;
use App\Models\User;



class RecetaController extends Controller
{
      
    //Se encarga de mostrar las recetas
    public function index(){
        $recetas = Receta::all();
        return view('receta.index')->with('recetas', $recetas);
        

    }

    public function indexUser(User $user){
        $recetas = $user->recetas()->get();
        return view('receta.index')->with('recetas', $recetas);
        
    }

    
    
    //Devuelve la vista para crear una receta (y el form para crear los ingredientes)
    public function create(){
        $categorias = Categoria::all();
        return view('receta.create')->with('categorias', $categorias);
    }

    //Store una nueva receta
    public function store (StoreRecetaRequest $request){
        $receta = new Receta();
        $receta->nombre = $request->nombre;
        $receta->descripcion =$request->descripcion;
        if($request->recomendacion){
            $receta->recomendacion =$request->recomendacion;
        }
        $receta->comensales =$request->comensales;
        $receta->tiempo_coccion =$request->tiempo_coccion;
        $receta->dificultad =$request->dificultad;

        

        if($request->hasFile('image')){
            $imagelink=file_get_contents($request->file('image'));
            $encode_image= base64_encode($imagelink);
            $receta->image=$encode_image;
        }
        $user = $request->user();
        $receta->user_id = $user->id;
        $receta->save();
        $user->recetas()->save($receta);
        
       
        
        if($request->categorias){
            foreach($request->categorias as $id_categoria){
            RecetaCategoria::create([
                'id_receta'=>$receta->id_receta,
                'id_categoria'=>$id_categoria
            ]);
            }
        }
       
        
       
        return redirect()->route('recetaIngrediente.create', ['id'=> $receta->id_receta]);
       
    }

    //Devuelve la vista de una receta en especifico
    public function show($id){
        $receta = Receta::findOrFail($id);
       
            if($receta->image){
                $path = public_path("imagenes/{$receta->id_receta}.jpg");
                if(file_exists($path)){
                   $file=fopen($path, "r");
                }else{
                    $file=fopen($path,"w");
                    fwrite($file, base64_decode(stream_get_contents($receta->image)));
                }
                $receta->image=$file;
            }
        



        $ingredientes = array();
        $cantidades = array();
        $recetaIngre = RecetaIngrediente::where('id_receta', '=', $id)->get();
        foreach ($recetaIngre as $recetaIng){
            $ingred = Ingrediente::findOrFail($recetaIng->id_ingrediente);
            $ingredientes[] = $ingred;
            $nombre = $ingred->nombre;
            $cantidades[$nombre] = $recetaIng->cantidad;
        }
       
        $recetasCategorias = RecetaCategoria::where('id_receta', '=', $id)->get();
        $categorias = array();
       foreach($recetasCategorias as $reccat){
            $categorias[] = Categoria::findOrFail($reccat->id_categoria);
       }
       
        return view('receta.show')->with(['receta'=> $receta,'ingredientes'=> $ingredientes, 'cantidades'=>$cantidades, 'categorias'=>$categorias]);
    }

    

    //Devuelve la vista para editar una receta

    public function edit($id){
        $receta = Receta::findOrFail($id);
        if($receta->image){
            $path = public_path("imagenes/{$receta->id_receta}.jpg");
            if(file_exists($path)){
               $file=fopen($path, "r");
            }else{
                $file=fopen($path,"w");
                fwrite($file, base64_decode(stream_get_contents($receta->image)));
            }
            $receta->image=$file;
        }
        $categorias = Categoria::all();
        $recetasCategorias = RecetaCategoria::where('id_receta', '=', $id)->get();
        $categoriasChecked = array();
       foreach($recetasCategorias as $reccat){
            $categoriasChecked[] = Categoria::findOrFail($reccat->id_categoria);
       }
        return view('receta.edit')->with(['receta'=> $receta,  'categorias'=> $categorias, 'categoriasChecked'=>$categoriasChecked]);
    }

    

    //Update una receta
    public function update (StoreRecetaRequest $request, $id){

       
        $receta = Receta::findOrFail($id);
        $receta->nombre = $request->nombre;
        $receta->descripcion =$request->descripcion;
        if($request->recomendacion){
            $receta->recomendacion =$request->recomendacion;
        }
        $receta->comensales =$request->comensales;
       
        $receta->tiempo_coccion =$request->tiempo_coccion;
        $receta->dificultad =$request->dificultad;

        if($request->hasFile('image')){
            $imagelink=file_get_contents($request->file('image'));
            $encode_image= base64_encode($imagelink);
            $receta->image=$encode_image;
        }

    
        $receta->save();

        RecetaCategoria::where('id_receta','=', $receta->id_receta)->delete();
        if($request->categorias){
            foreach($request->categorias as $id_categoria){
                RecetaCategoria::create([
                    'id_receta'=>$receta->id_receta,
                    'id_categoria'=>$id_categoria
                ]);
            }
        }

        return redirect()->route('receta.edit', ['id'=> $id]);
        
    }


    public function delete($id){
        $receta = Receta::findOrFail($id);
        $recetaIng = RecetaIngrediente::where('id_receta', '=', $id);
        
        $ingredientes=array();
        foreach($recetaIng->get() as $recing){
            $ingrediente = RecetaIngrediente::where('id_ingrediente','=', $recing->id_ingrediente)->get();
            if(sizeof($ingrediente)===1){
                $ingred = Ingrediente::where('id_ingrediente','=', $recing->id_ingrediente);
                $ingredientes[] = $ingred;
            }

        }


        $recetaCateg = RecetaCategoria::where('id_receta', '=', $id);
        if($recetaIng!=null){
           $recetaIng->delete();
        }
        if($recetaCateg){
            $recetaCateg->delete();
        }
        foreach($ingredientes as $ingrediente){
            $ingrediente->delete();
        }
        
        
        $receta->delete();
        return redirect()->route('receta.index');

    }

}
