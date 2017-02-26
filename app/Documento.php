<?php

namespace SisVenta;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = 'documentos';
	protected $fillable = ['id', 'nombre', 'operacion', 'estado'];
	public $timestamps = false;	
}
