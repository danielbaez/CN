@extends('template')
@section('content')
	<h3>Proveedores <a class="btn btn-success" href="{{ route('admin.proveedores.create') }}"><i class="fa fa-plus fa-lg"></i> Crear</a></h3>
    @include('partials.messages')
	<div class="row">
		<div class="table-responsive">
        	<table class="table table-hover">
        		<thead>
        			<tr>
        				<th>#</th><th>Nombre</th><th>Apellido</th><th>Tipo Documento</th><th>Nro Documento</th><th>Dirección</th><th>Teléfono</th><th>Email</th><th>Estado</th><th>Operación</th>
        			</tr>
        		</thead>
        		<tbody>
        			@foreach($proveedores as $proveedor)
        			<tr>
        				<th scope="row">{{ $proveedor->id }}</th><td>{{ $proveedor->nombre }}</td><td>{{ $proveedor->apellido }}</td><td>{{ $proveedor->tipo_documento }}</td><td>{{ $proveedor->nro_documento }}</td><td>{{ $proveedor->direccion }}</td><td>{{ $proveedor->telefono }}</td><td>{{ $proveedor->email }}</td><td><h5 style="margin-top: 0; margin-bottom: 0;"><span class="label label-{{ $proveedor->estado == 1 ? 'primary' : 'danger' }}">{{ $proveedor->estado == 1 ? 'Activo' : 'Inactivo' }}</span></h5></td><td>{{ $proveedor->representante }}</td><td><a href="{{ route('admin.proveedores.edit', $proveedor->id) }}" class="btn btn-primary"><i class="fa fa-edit fa-lg"></i></a>{!! Form::open(['route' => ['admin.proveedores.destroy', $proveedor],'style' => 'display:inline']) !!}
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