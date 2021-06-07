<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Receta;
use App\Models\Categoria;

class RecetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Receta::create([
        //     'nombre'=> 'Brownies de chocolate',
        //     'descripcion'=> 'Para arrancar con nuestra receta de brownies de chocolate, 
        //             vamos a colocar la manteca y el chocolate picados en una sartén, 
        //             y llevarlos a fuego bien bien bajo. Lo tapamos y vamos a dejarlo por unos 5 minutos sin toca. 
        //             Confíen! Ahora lo retiramos del fuego, y lo vamos a revolver hasta que esté todo derretido e integrado. 
        //             A parte vamos a batir los 2 huevos con el azúcar hasta que queden bien blancos, 
        //             esto es clave para que el brownie casero quede bien húmedo. Agregar el chocolate derretido y batir hasta que esté integrado. 
        //             Sumar las nueces en pedazos grandes o como más les guste. Sumar el harina 0000 tamizada en dos partes e integrar todo como se ve en el video. 
        //             Es importante batir fuerte antes de pasar el brownie de chocolate al molde. Colocar en una placa y mandar al horno fuerte.',
        //     'recomendacion'=> 'horno fuerte (200-220)',
        //     'comensales'=>10,
        //     'tiempo_coccion'=>'20 minutos',
        //     'dificultad'=>'facil',
        //     'id_categoria'=> Categoria::select('id_categoria')->where('nombre', '=', 'Dulce')->first()
            
        // ]);
        
    }
}