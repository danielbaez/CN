@extends('template')
@section('content')
	<h3>Empleados</h3>
	<div class="row">
		<div class="table-responsive">
        	<table class="table table-hover">
        		<thead>
        			<tr>
        				<th>#</th><th>Nombre</th><th>Apellido</th><th>Documento</th><th>Nro Documento</th><th>Teléfono</th><th>Foto</th><th>Operación</th>
        			</tr>
        		</thead>
        		<tbody>
        			@foreach($empleados as $empleado)
        			<tr>
        				<th scope="row">{{ $empleado->id }}</th><td>{{ $empleado->nombre }}</td><td>{{ $empleado->apellido }}</td><td>{{ $empleado->tipo_documento }}</td><td>{{ $empleado->nro_documento }}</td><td>{{ $empleado->telefono }}</td><td><img style="width: 60px;height: 60px;" class="img-circle" src="{{ asset('images/img.jpg') }}"></td><td><a class="btn btn-success" href="{{ route('admin.empleados.create') }}"><i class="fa fa-plus fa-lg"></i></a><a class="btn btn-primary"><i class="fa fa-edit fa-lg"></i></a><a class="btn btn-danger"><i class="fa fa-times fa-lg"></i></a></td>
        			</tr>
        			@endforeach
        		</tbody>
        	</table>
    	</div>
	</div>
@stop