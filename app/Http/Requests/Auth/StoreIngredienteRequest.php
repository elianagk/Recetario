<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class StoreIngredienteRequest extends FormRequest
{

    public function authorize(){

        return true;

    }

    public function rules(){


        $rules = [
            'nombre' => 'required|max:60'
            
        ];

        return $rules;

    }








}