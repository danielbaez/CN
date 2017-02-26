<?php

namespace SisVenta\Http\Requests;

use SisVenta\Http\Requests\Request;

class DocumentoRequest extends Request
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
            'nombre'      => 'required|max:20',
            'operacion'      => 'required|in:Persona,Proveedor',
            'estado'      => 'required|in:1,0'
        ];
    }
}
