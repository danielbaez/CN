<?php

namespace SisVenta;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
	protected $fillable = ['id', 'id_categoria', 'nombre', 'descripcion', 'imagen', 'estado'];
	public $timestamps = false;
}
