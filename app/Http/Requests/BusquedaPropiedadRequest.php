<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'venta' => 'required_without_all:arriendo',
            'precio' => 'required',
            'comuna_id' => 'required|integer',
            'divisa' => 'required',
            'tipo_propiedad' => 'required', Rule::in(['casa', 'apartamento', 'oficina', 'local_comercial', 'bodega', 'terreno', 'estacionamiento']),
        ];
    }
}
