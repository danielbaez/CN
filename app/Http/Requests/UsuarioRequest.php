<?php

namespace SisVenta\Http\Requests;

use SisVenta\Http\Requests\Request;

class UsuarioRequest extends Request
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
            'id_empleado'      => 'required|exists:empleados,id',
            'id_sucursal'      => 'required|exists:sucursales,id',
            'tipo_usuario'      => 'required|in:administrador,empleado',
            'estado'      => 'required|in:1,0'
        ];
    }
}
