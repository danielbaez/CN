@extends('template')
@section('content')
	<h3>Configuración</h3>
    @include('partials.messages')
	<div class="row">
		<div class="table-responsive">
        	<table class="table table-hover">
        		<thead>
        			<tr>
        				<th>#</th><th>Empresa</th><th>Impuesto</th><th>Porcentaje</th><th>Moneda</th><th>Logo</th><th>Operación</th>
        			</tr>
        		</thead>
        		<tbody>
        			@foreach($configuracion as $conf)
        			<tr>
        				<th scope="row">{{ $conf->id }}</th><td>{{ $conf->empresa }}</td><td>{{ $conf->nom_impuesto }}</td><td>{{ $conf->por_impuesto }}%</td><td>{{ $conf->moneda }}</td>
                        <td>
                            <img style="width: 180px; margin: 0 auto; display: block;" src="{{ asset('images/logo.png') }}">
                        </td><td><a href="{{ route('admin.configuracion.edit', $conf->id) }}" class="btn btn-primary"><i class="fa fa-edit fa-lg"></i></a></td>
        			</tr>
        			@endforeach
        		</tbody>
        	</table>
    	</div>
	</div>
@stop