<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusquedaPropiedadRequest extends FormRequest
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
            'arriendo' => 'required_without_all:venta',
            'precio' => 'required',
            'comuna' => 'required|integer',
            'divisa' => 'required',
            'tipo_propiedad' => 'required', Rule::in(['casa', 'apartamento' , 'oficina' , 'local_comercial', 'bodega' , 'terreno' , 'estacionamiento']),
        ];
    }
}
