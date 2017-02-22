@extends('template')
@section('content')
	<h3>Sucursales <a class="btn btn-success" href="{{ route('admin.sucursales.create') }}"><i class="fa fa-plus fa-lg"></i> Crear</a></h3>
    @include('partials.messages')
	<div class="row">
		<div class="table-responsive">
        	<table class="table table-hover">
        		<thead>
        			<tr>
        				<th>#</th><th>Razón Social</th><th>Tipo Documento</th><th>Nro Documento</th><th>Dirección</th><th>Teléfono</th><th>Estado</th><th>Representante</th><th>Operación</th>
        			</tr>
        		</thead>
        		<tbody>
        			@foreach($sucursales as $suc)
        			<tr>
        				<th scope="row">{{ $suc->id }}</th><td>{{ $suc->razon_social }}</td><td>{{ $suc->tipo_documento }}</td><td>{{ $suc->nro_documento }}</td><td>{{ $suc->direccion }}</td><td>{{ $suc->telefono }}</td><td><h5 style="margin-top: 0; margin-bottom: 0;"><span class="label label-{{ $suc->estado == 1 ? 'primary' : 'danger' }}">{{ $suc->estado == 1 ? 'Activo' : 'Inactivo' }}</span></h5></td><td>{{ $suc->representante }}</td><td><a href="{{ route('admin.sucursales.edit', $suc->id) }}" class="btn btn-primary"><i class="fa fa-edit fa-lg"></i></a>{!! Form::open(['route' => ['admin.sucursales.destroy', $suc],'style' => 'display:inline']) !!}
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