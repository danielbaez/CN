@extends('template')
@section('content')
	<h3>Documentos <a class="btn btn-success" href="{{ route('admin.documentos.create') }}"><i class="fa fa-plus fa-lg"></i> Crear</a></h3>
    @include('partials.messages')
	<div class="row">
		<div class="table-responsive">
        	<table class="table table-hover">
        		<thead>
        			<tr>
        				<th>#</th><th>Documento</th><th>Tipo</th><th>Estado</th><th>Operación</th>
        			</tr>
        		</thead>
        		<tbody>
        			@foreach($documentos as $documento)
        			<tr>
        				<th scope="row">{{ $documento->id }}</th><td>{{ $documento->nombre }}</td><td>{{ $documento->operacion }}</td><td><h5 style="margin-top: 0; margin-bottom: 0;"><span class="label label-{{ $documento->estado == 1 ? 'primary' : 'danger' }}">{{ $documento->estado == 1 ? 'Activo' : 'Inactivo' }}</span></h5></td><td><a href="{{ route('admin.documentos.edit', $documento->id) }}" class="btn btn-primary"><i class="fa fa-edit fa-lg"></i></a>{!! Form::open(['route' => ['admin.documentos.destroy', $documento],'style' => 'display:inline']) !!}
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