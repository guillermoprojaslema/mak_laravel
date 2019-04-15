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
            'negocio' => 'required', Rule::in(['arriendo', 'venta']),
            'min_precio' => 'required|integer',
            'max_precio' => 'required|integer',
            'comuna_id' => 'required|integer',
            'divisa' => 'required', Rule::in(['CLP', 'USD', 'EUR', 'UF']),
            'tipo_propiedad' => 'required', Rule::in(['casa', 'apartamento', 'oficina', 'local_comercial', 'bodega', 'terreno', 'estacionamiento']),
        ];
    }

    public function messages()
    {
        return [
            'negocio.required' => 'Debe elegir una opción',
            'min_price.required' => 'Debe elegir un rango de precios mínimo',
            'max_price.required' => 'Debe elegir un rango de precios máximo',
            'comuna_id.required' => 'Debe elegir una comuna',
            'divisa.required' => 'Debe elegir un tipo de divisa',
            'tipo_propiedad.required' => 'Debe elegir al menos un tipo de propiedad',
        ];
    }
}
