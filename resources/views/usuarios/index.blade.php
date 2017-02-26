@extends('template')
@section('content')
	<h3>Usuarios <a class="btn btn-success" href="{{ route('admin.usuarios.create') }}"><i class="fa fa-plus fa-lg"></i> Crear</a></h3>
    si es dl tipo admin entoncs no mostrar sucursales<br>
    la difrenrecia de persimos en el caso de empleado con  admin, es en los reportes
    <br> admin : podras ver los reportes en base al escoger sucrusales
    <br>empleado:podra ver reportes de solo la sucrusal al cual pertenece
    @include('partials.messages')
	<div class="row">
		<div class="table-responsive">
        	<table class="table table-hover">
        		<thead>
        			<tr>
        				<th>#</th><th>Usuario</th><th>Sucursal</th><th>Tipo Usuario</th><th>Permisos</th><th>Estado</th><th>Operación</th>
        			</tr>
        		</thead>
        		<tbody>
        			@foreach($usuarios as $usuario)
        			<tr>
        				<th scope="row">{{ $usuario->id }}</th><td>{{ $usuario->usuario }}</td><td>{{ $usuario->razon_social }}</td><td>{{ $usuario->tipo_usuario }}</td>
                        <td>
                        <ul style="padding: 0">
                            <li style="display:{{ $usuario->per_mantenimiento ? 'block' : 'none' }}">{{ $usuario->per_mantenimiento ? 'Mantemiento' : '' }}</li>
                            <li style="display:{{ $usuario->per_almacen ? 'block' : 'none' }}">{{ $usuario->per_almacen ? 'Almacen' : '' }}</li>
                            <li style="display:{{ $usuario->per_compra ? 'block' : 'none' }}">{{ $usuario->per_compra ? 'Compra' : '' }}</li>
                            <li style="display:{{ $usuario->per_venta ? 'block' : 'none' }}">{{ $usuario->per_venta ? 'Venta' : '' }}</li>
                            <li style="display:{{ $usuario->per_seguridad ? 'block' : 'none' }}">{{ $usuario->per_seguridad ? 'Backup' : '' }}</li>
                            <li style="display:{{ $usuario->per_con_compra ? 'block' : 'none' }}">{{ $usuario->per_con_compra ? 'Reporte Compras' : '' }}</li>
                            <li style="display:{{ $usuario->per_con_venta ? 'block' : 'none' }}">{{ $usuario->per_con_venta ? 'Reporte Ventas' : '' }}</li>
                        </ul>
                            
                        </td>
                        <td><h5 style="margin-top: 0; margin-bottom: 0;"><span class="label label-{{ $usuario->estado == 1 ? 'primary' : 'danger' }}">{{ $usuario->estado == 1 ? 'Activo' : 'Inactivo' }}</span></h5></td><td><a href="{{ route('admin.usuarios.edit', $usuario->id) }}" class="btn btn-primary"><i class="fa fa-edit fa-lg"></i></a>{!! Form::open(['route' => ['admin.usuarios.destroy', $usuario->id],'style' => 'display:inline']) !!}
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