<?php

use App\Http\Controllers\RecetaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\IngredienteController;
use App\Http\Controllers\RecetaIngredienteController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

require __DIR__.'/auth.php';


Route::middleware(['auth', 'role:admin']) -> group(function(){
    
   
    Route::get('/categorias/create', [CategoriaController::class, 'create'])->name('categoria.create');
    Route::get('/categorias/edit/{id}', [CategoriaController::class, 'edit'])->name('categoria.edit');
    Route::delete('/categorias/delete/{id}', [CategoriaController::class, 'delete'])->name('categoria.delete');
    Route::post('/categorias/store', [CategoriaController::class, 'store'])->name('categoria.store');
    Route::patch('/categorias/update/{id}', [CategoriaController::class, 'update'])->name('categoria.update');

    Route::post('/ingredientes/store', [IngredienteController::class, 'store'])->name('ingrediente.store');
    Route::get('/ingredientes/edit/{id}', [IngredienteController::class, 'edit'])->name('ingrediente.edit');
    Route::delete('/ingredientes/delete/{id}', [IngredienteController::class, 'delete'])->name('ingrediente.destroy');
    Route::get('/ingredientes/create', [IngredienteController::class, 'create'])->name('ingrediente.create');
    Route::patch('/ingredientes/update/{id}', [IngredienteController::class, 'update'])->name('ingrediente.update');

    
});


Route::middleware(['auth', 'role:recipe_creator']) -> group(function(){
    Route::get('/receta/crear', [RecetaController::class, 'create'])->name('receta.create');
    Route::get('/receta/user/{user}', [RecetaController::class, 'indexUser'])->name('receta.index.user');
    Route::delete('/receta/delete/{id}', [RecetaController::class, 'delete'])->name('receta.destroy');
    
    Route::get('/ingrediente/crear/{id}', [RecetaIngredienteController::class, 'create'])->name('recetaIngrediente.create');
    Route::get('/receta/edit/{id}', [RecetaController::class, 'edit'])->name('receta.edit');
    Route::post('/receta/store', [RecetaController::class, 'store'])->name('receta.store');
    Route::patch('/receta/update/{id}', [RecetaController::class, 'update'])->name('receta.update');
    Route::post('/recetaing/store', [RecetaIngredienteController::class, 'store'])->name('recetaIngrediente.store');
    Route::get('/recetaing/edit/{id}', [RecetaIngredienteController::class, 'edit'])->name('recetaIngrediente.edit');
    Route::patch('/recetaing/update/{id}', [RecetaIngredienteController::class, 'update'])->name('recetaIngrediente.update');
    Route::get('/recetaing/delete/{id}', [RecetaIngredienteController::class, 'delete'])->name('recetaIngrediente.delete');
    Route::delete('/recetaing/destroy/{idIngred}/{idReceta}', [RecetaIngredienteController::class, 'deleted'])->name('recetaIngrediente.destroy');



});



//Lo que pueden ver los que no estan loggeados. (Role:users solo pueden ver esto )
Route::get('/', [RecetaController::class, 'index'])->name('receta');


Route::get('/receta', [RecetaController::class, 'index'])->name('receta.index');
Route::get('/receta/show/{id}', [RecetaController::class, 'show'])->name('receta.show');

Route::get('/categorias/show/{id}', [CategoriaController::class, 'show'])->name('categoria.show');
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categoria.index');

Route::get('/ingredientes', [IngredienteController::class, 'index'])->name('ingrediente.index');
Route::get('/ingredientes/show/{id}', [IngredienteController::class, 'show'])->name('ingrediente.show');




