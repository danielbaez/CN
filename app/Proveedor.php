<?php

namespace SisVenta;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'personas';
	protected $fillable = ['id', 'nombre', 'apellido', 'tipo_persona', 'tipo_documento', 'nro_documento', 'direccion', 'telefono', 'email', 'estado'];
}
