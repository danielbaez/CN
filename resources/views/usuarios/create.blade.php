@extends('template')
@section('content')
	<h3>Crear Usuario</h3>
  <div class="row" style="width: 85%;margin: 0 auto">
      @include('partials.errors')

      {!! Form::open(['route'=>'admin.usuarios.store']) !!}
          <div class='col-xs-12 col-md-6'>
              <div class="form-group" id="companiesForm">
                <label for="type">Tipo Usuario:</label>
                  {!! Form::select('tipo_usuario', $tipo_usuario, null, ['class' => 'form-control tipo_usuario', 'placeholder' => 'Seleccione']) !!}
              </div>
          </div>
          <div class='col-xs-12 col-md-6'>
              <div class="form-group" id="companiesForm">
                <label for="type">Empleado:</label>
                  {!! Form::select('id_empleado', $empleados, null, ['class' => 'form-control', 'placeholder' => 'Seleccione']) !!}
              </div>
          </div>
          <div class='col-xs-12 col-md-6 div-sucursales'>
              <div class="form-group" id="companiesForm">
                <label for="type">Sucursal:</label>
                  {!! Form::select('id_sucursal', $sucursales, null, ['class' => 'form-control sucursales', 'placeholder' => 'Seleccione']) !!}
              </div>
          </div>
          
          <div class='col-xs-12 col-md-6'>
              <div class="form-group" style="margin-bottom: 18px">
                  <label for="type">Estado:</label>
                  <div class="radio" style="margin-top: -12px; margin-bottom: 0;">
                    <label style="min-height: 0;"></label>
                  </div>
                  <label class="radio-inline">
                      {!! Form::radio('estado', 1, true) !!} Activo
                  </label>
                  <label class="radio-inline">
                      {!! Form::radio('estado', 0) !!} Inactivo
                  </label>
              </div>
          </div>
          <div class='col-xs-12'>
              <div class="form-group" id="companiesForm">
                <label for="type">Permisos:</label><br>
                  <label class="checkbox-inline">
                  {!! Form::checkbox('per_mantenimiento', 'on') !!} Mantenimiento
                  </label>
                  <label class="checkbox-inline">
                  {!! Form::checkbox('per_almacen', 'on') !!} Almacen
                  </label>
                  <label class="checkbox-inline">
                  {!! Form::checkbox('per_compra', 'on') !!} Compra
                  </label>
                  <label class="checkbox-inline">
                  {!! Form::checkbox('per_venta', 'on') !!} Venta
                  </label>
                  <label class="checkbox-inline">
                  {!! Form::checkbox('per_seguridad', 'on') !!} Backup
                  </label>
                  <label class="checkbox-inline">
                  {!! Form::checkbox('per_con_compra', 'on') !!} Reporte Compras
                  </label> 
                  <label class="checkbox-inline">
                  {!! Form::checkbox('per_con_venta', 'on') !!} Reporte Ventas
                  </label>
              </div>
          </div>    
          <!-- <div class='col-xs-12'>
              <div class="form-group" id="companiesForm">
                <label for="type">Permisos:</label><br>
                  <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox1" name="per[]" value="per_mantenimiento"> Mantenimiento
                  </label>
                  <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox2" name="per[]" value="per_almacen"> Almacen
                  </label>
                  <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox3" name="per[]" value="per_compra"> Compra
                  </label>
                  <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox3" name="per[]" value="per_venta"> Venta
                  </label>
                  <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox3" name="per[]" value="per_seguridad"> Backup
                  </label>
                  <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox3" name="per[]" value="per_con_compra"> Reporte Compras
                  </label>
                  <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox3" name="per[]" value="per_con_venta"> Reporte Ventas
                  </label>
              </div>
          </div> -->  
          <div class='col-sm-12'>
              <div class="form-group text-center">
                  {!! Form::submit('Guardar', array('class'=>'btn btn-success')) !!}
                  <a href="{{ route('admin.usuarios.index') }}" class="btn btn-danger">Cancelar</a>
              </div>
          </div>
      {!! Form::close() !!}

  </div>
@stop