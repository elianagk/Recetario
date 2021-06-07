<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{

    public function authorize(){

        return true;

    }

    public function rules(){


        $rules = [
            'nombre' => 'required',
            'email' => 'required',
            'password' => 'required'
            
        ];

        return $rules;

    }








}