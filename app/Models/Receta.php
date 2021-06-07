<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Receta extends Model
{
   
    protected $table = "receta";
    protected $primaryKey= "id_receta";
    public $timestamps = false;
    
   


    protected $fillable = [
        'nombre',
        'descripcion',
        'recomendacion',
        'comensales',
        'tiempo_coccion',
        'dificultad',
        'image'
    ];

    
    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

}
