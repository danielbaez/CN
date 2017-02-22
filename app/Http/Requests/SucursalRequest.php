<?php

namespace SisVenta\Http\Requests;

use SisVenta\Http\Requests\Request;

class SucursalRequest extends Request
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
            'razon_social'      => 'required|max:100',
            'tipo_documento'      => 'required|in:dni,ruc',
            'nro_documento'      => 'required|max:20',
            'direccion'      => 'required|max:100',
            'telefono'      => 'required|max:10',
            'representante'  => 'required|max:50',
            'estado'      => 'required|in:1,0'
        ];
    }
}
