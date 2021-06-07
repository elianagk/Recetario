<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class StoreRIRequest extends FormRequest
{

    public function authorize(){

        return true;

    }

    public function rules(){


        $rules = [
            'id_receta' => 'required',
            'nombre_ingrediente' => 'required|max:60',
            'cantidad' => 'required|max:100'
           
        ];

        return $rules;

    }








}