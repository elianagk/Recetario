<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecetaCategoria extends Model
{
    public $timestamps = false;
    protected $table = "receta_categoria";
    protected $primaryKey= "id_receta_categoria";

   protected $fillable = [
        'id_categoria',
        'id_receta'
    ];

}
