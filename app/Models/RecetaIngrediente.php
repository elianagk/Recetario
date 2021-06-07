<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class RecetaIngrediente extends Model
{
  
    public $timestamps = false;
    protected $table = "receta_ingredientes";
    protected $primaryKey= "id_receta_ingrediente";

   protected $fillable = [
        'id_ingrediente',
        'cantidad',
        'id_receta'
    ];

    

}
