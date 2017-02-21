<?php

namespace SisVenta\Http\Requests;

use SisVenta\Http\Requests\Request;

class EmpleadoRequest extends Request
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
            'nombre'      => 'required|max:50',
            'apellido'      => 'required|max:50',
            'tipo_documento'      => 'required|in:dni,ruc',
            'nro_documento'      => 'required|max:20',
            'fecha_nacimiento'      => 'required',
            'direccion'      => 'required|max:100',
            'telefono'      => 'required|max:10',
            'email'     => 'required|unique:empleados',
            'usuario'     => 'required|unique:empleados',
            'password'  => 'required|max:20',
            'estado'      => 'required|in:1,0'
        ];
    }
}
