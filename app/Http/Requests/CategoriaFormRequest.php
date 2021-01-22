<?php

namespace SisVentaNew\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaFormRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|max:50',
            'descripcion' => 'max:256',            
        ];
    }
}
