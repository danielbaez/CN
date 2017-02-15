<?php

namespace SisVenta;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table = 'sucursales';
	protected $fillable = ['razon_social', 'tipo_documento', 'nro_documento', 'direccion', 'telefono', 'representante', 'estado'];
	public $timestamps = false;
}
