<?php

namespace SisVentaNew\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MensualFormReques extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'tipo_comprobante' => 'required|max:20',
          'num_comprobante' => 'required|max:10',
          'idarticulo' => 'required',
          'cantidad' => 'required',
          'precio_venta' => 'required',
          'descuento' => 'required',
          'total_venta' =>'required'
        ];
    }
}
