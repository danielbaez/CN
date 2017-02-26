<?php

namespace SisVenta;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
	protected $fillable = ['id', 'nombre', 'descripcion', 'estado'];
	public $timestamps = false;
}
