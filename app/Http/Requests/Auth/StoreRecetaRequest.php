<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecetaRequest extends FormRequest
{

    public function authorize(){

        return true;

    }

    public function rules(){


        $rules = [
            'nombre' => 'required',
            'descripcion' => 'required',
            'comensales' => 'required',
            'tiempo_coccion' => 'required|date_format:H:i:s',
            'dificultad' => 'required|max:100'
        ];

        return $rules;

    }








}