<?php

namespace SisVenta;

use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    protected $table = 'configuracion';
	protected $fillable = ['id', 'empresa', 'nom_impuesto', 'por_impuesto', 'moneda', 'logo'];
	public $timestamps = false;
}
