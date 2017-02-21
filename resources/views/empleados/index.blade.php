@extends('template')
@section('content')
	<h3>Empleados <a class="btn btn-success" href="{{ route('admin.empleados.create') }}"><i class="fa fa-plus fa-lg"></i> Crear</a></h3>
    @include('partials.messages')
	<div class="row">
		<div class="table-responsive">
        	<table class="table table-hover">
        		<thead>
        			<tr>
        				<th>#</th><th>Nombre</th><th>Apellido</th><th>Documento</th><th>Nro Documento</th><th>Teléfono</th><th>Estado</th><th>Foto</th><th>Operación</th>
        			</tr>
        		</thead>
        		<tbody>
        			@foreach($empleados as $empleado)
        			<tr>
        				<th scope="row">{{ $empleado->id }}</th><td>{{ $empleado->nombre }}</td><td>{{ $empleado->apellido }}</td><td>{{ $empleado->tipo_documento }}</td><td>{{ $empleado->nro_documento }}</td><td>{{ $empleado->telefono }}</td><td><h5 style="margin-top: 0; margin-bottom: 0;"><span class="label label-{{ $empleado->estado == 1 ? 'primary' : 'danger' }}">{{ $empleado->estado == 1 ? 'Activo' : 'Inactivo' }}</span></h5></td><td><img style="width: 60px;height: 60px;" class="img-circle" src="{{ asset('images/img.jpg') }}"></td><td><a href="{{ route('admin.empleados.edit', $empleado->id) }}" class="btn btn-primary"><i class="fa fa-edit fa-lg"></i></a>{!! Form::open(['route' => ['admin.empleados.destroy', $empleado],'style' => 'display:inline']) !!}
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