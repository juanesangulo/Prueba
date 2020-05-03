<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Ingreso_vehiculoFormRequest extends FormRequest
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
            'placa' => 'required',
            'fecha_ingreso' => 'required',
            'estado' => 'required',
            'users_id' => 'required',
        ];
    }
}
