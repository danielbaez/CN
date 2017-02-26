<?php

namespace SisVenta\Http\Requests;

use SisVenta\Http\Requests\Request;

class ConfiguracionRequest extends Request
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
            'empresa'      => 'required|max:100',
            'nom_impuesto'      => 'required|max:20'
        ];
    }
}
