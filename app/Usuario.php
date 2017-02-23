<?php

namespace SisVenta;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
	protected $fillable = ['id_empleado', 'id_sucursal', 'tipo_usuario', 'estado', 'per_mantenimiento', 'per_almacen', 'per_compra', 'per_venta', 'per_seguridad', 'per_admin', 'per_con_compra', 'per_con_venta'];
	//public $timestamps = false;
}

