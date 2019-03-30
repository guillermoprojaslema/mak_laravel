<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactoRequest extends FormRequest
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
            'nombre' => 'required|string|min:2|max:191',
            'email' => 'required|email|min:2|max:191',
            'telefono' => 'required|string|min:2|max:191',
            'asunto' => 'required|string|min:2|max:191',
            'mensaje' => 'required|string|min:2',
        ];
    }
}
