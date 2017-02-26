@extends('template')
@section('content')
	<h3>Productos <a class="btn btn-success" href="{{ route('admin.productos.create') }}"><i class="fa fa-plus fa-lg"></i> Crear</a></h3>
    @include('partials.messages')
	<div class="row">
		<div class="table-responsive">
        	<table class="table table-hover">
        		<thead>
        			<tr>
        				<th>#</th><th>Nombre</th><th>Categoría</th><th>Descripción</th><th>Imagen</th><th>Estado</th><th>Operación</th>
        			</tr>
        		</thead>
        		<tbody>
        			@foreach($productos as $producto)
        			<tr>
        				<th scope="row">{{ $producto->id }}</th><td>{{ $producto->nombre }}</td><td>{{ $producto->categoria }}</td><td>{{ $producto->descripcion }}</td><td>
                        @if(is_file(public_path().'/images/productos/'.$producto->imagen))
                            <img width="80px" height="80px" src="{{asset('images/productos/'.$producto->imagen)}}" class="img-circle"> 
                        @else
                            <img width="80px" height="80px" class="img-circle" src="{{ asset('images/img.jpg') }}">
                        @endif
                        </td><td><h5 style="margin-top: 0; margin-bottom: 0;"><span class="label label-{{ $producto->estado == 1 ? 'primary' : 'danger' }}">{{ $producto->estado == 1 ? 'Activo' : 'Inactivo' }}</span></h5></td><td><a href="{{ route('admin.productos.edit', $producto->id) }}" class="btn btn-primary"><i class="fa fa-edit fa-lg"></i></a>{!! Form::open(['route' => ['admin.productos.destroy', $producto->id],'style' => 'display:inline']) !!}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button onClick="return confirm('Esta seguro que quiere desactivar este registro?')" class="btn btn-danger">
                                            <i class="fa fa-times fa-lg"></i>
                                        </button>
                                    {!! Form::close() !!}</td>
        			</tr>
        			@endforeach
        		</tbody>
        	</table>
    	</div>
	</div>
@stop