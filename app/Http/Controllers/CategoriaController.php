<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\StoreCategoriaRequest;
use App\Models\Categoria;
use App\Models\RecetaCategoria;
use App\Models\Receta;
use GuzzleHttp\Client;
class CategoriaController extends Controller
{
    public function index(){

        $categorias = Categoria::all();
        return view('categoria.index')->with('categorias', $categorias);

    }

    //Crear una nueva categoria
    public function create(){
        return view('categoria.create');
    }

    public function store (StoreCategoriaRequest $request){

        Categoria::create($request->all());
        return redirect()->route('categoria.index');
       
    }

    //Devuelve la vista de todas las recetas asociadas a una categoria
    public function show($id){
        $categoria = Categoria::findOrFail($id);
        $recetasCategorias = RecetaCategoria::where('id_categoria', '=', $id)->get();
        $recetas = array();
        foreach($recetasCategorias as $recCat){
            $recetas[] = Receta::findOrFail($recCat->id_receta);
        }

        //$recetas = $this->randomrecipe($recetas, $categoria);

        return view('categoria.show')->with(['recetas'=> $recetas,'categoria'=> $categoria]);
    }

    // private function randomrecipe(Array $recetas, Categoria $categoria): Array{
        
    //     $translate = new GoogleTranslate();
    //     $translate->setSource('es');
    //     $translate->setTarget('en');
    //     $category = $translate->translate($categoria->nombre);
        
        
    //     $client = new Client ();
    //     $url = 'www.themealdb.com/api/json/v1/1/filter.php?c='.$category;
       
    //     $headers = [
    //         'api-key' => '1'
    //     ];
    //     $response = $client->request('GET', $url, [
    //         'headers' => $headers,
    //         'verify'  => false,
    //     ]);

    //     $recipes = json_decode($response->getBody());
        
    //     $recipe = $recipes->meals;
        
    //     $translate->setSource('en');
    //     $translate->setTarget('es');

    //     if(!is_null($recipe)){
    //         $random = rand(0, sizeof($recipe));
    //         $id = $recipe[$random]->idMeal;
    //         $unareceta =  $client->request('GET', 'www.themealdb.com/api/json/v1/1/lookup.php?i='.$id, [
    //             'headers' => $headers,
    //             'verify'  => false,
    //         ]);

    //         $recetarandom = json_decode($unareceta->getBody());
            
    //         $arreglo = $recetarandom->meals;
           
    //         $imagelink=file_get_contents($arreglo[0]->strMealThumb);
    //         $encode_image= base64_encode($imagelink);

    //         $receta = Receta::firstOrCreate([
    //             'nombre' =>$translate->translate($arreglo[0]->strMeal),
    //             'descripcion' => $translate->translate($arreglo[0]->strInstructions),
    //             'recomendacion' => $arreglo[0]->strSource,
    //             'comensales' => 1,
    //             'tiempo_coccion' => "",
    //             'dificultad'=> "",
    //             'image' => $encode_image
    //         ]);
            
    //         //Preguntar si la receta ya tiene ingredientes asociados -> ya estaba creada

    //         $ingred = RecetaIngrediente::where('id_receta', '=', $receta->id_receta)->first();
            
    //         if(is_null($ingred)){
    //              //Guardar los ingredientes
            
    //             for($i=1; $i<=20 ; $i++){
    //                 $nombreIngrediente = "strIngredient";
    //                 $nombreIngrediente .=$i;
                    
    //                 $ingrediente = $translate->translate($arreglo[0]->$nombreIngrediente);
                    
    //                 if(is_null($ingrediente)){
                        
    //                 break;
    //                 }
    //                 else{
    //                     $cantidadIngrediente = "strMeasure";
    //                     $cantidadIngrediente.= $i;

    //                     $cantidad = $translate->translate($arreglo[0]->$cantidadIngrediente);
                        
    //                     $ingrediente = Ingrediente::firstOrCreate([
    //                         'nombre' => $ingrediente
    //                     ]);
    //                     $id_receta = $receta->id_receta;
    //                     RecetaIngrediente::create([
    //                         'id_ingrediente' => $ingrediente->id_ingrediente,
    //                         'id_receta'=> $id_receta,
    //                         'cantidad' => $cantidad
    //                     ]);
    //                 }
                    
    //             }

    //             $recetas[] = $receta;
            
    //             RecetaCategoria::create([
    //                 'id_categoria' => $categoria->id_categoria,
    //                 'id_receta' => $receta->id_receta
    //             ]);
    //         }
            
    //     }

    //     return $recetas;
    // }


    public function edit($id){
        $categoria = Categoria::findOrFail($id);
        return view('categoria.edit')->with('categoria', $categoria);
    }

    public function delete($id){
        $categoria = Categoria::findOrFail($id);
        $recetasCat = RecetaCategoria::where('id_categoria', '=', $id);
        $recetasCat->delete();
        $categoria->delete();
        return redirect()->route('categoria.index');

    }


    public function update (StoreCategoriaRequest $request, $id){
        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->all());
        return redirect()->route('categoria.index');
    }
}
