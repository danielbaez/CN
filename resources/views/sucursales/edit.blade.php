@extends('template')
@section('content')
	<h3>Editar Sucursal</h3>
  <div class="row" style="width: 85%;margin: 0 auto">
      @include('partials.errors')

      {!! Form::model($sucursalOne, array('route' => array('admin.sucursales.update', $sucursalOne))) !!}
          <input type="hidden" name="_method" value="PUT">
          <div class='col-xs-12 col-md-6'>
              <div class="form-group">
                  <label for="name">Razón Social:</label>
                  
                  {!! 
                      Form::text(
                          'razon_social', 
                          null, 
                          array(
                              'class'=>'form-control',
                              'autofocus' => 'autofocus',
                              //'required' => 'required'
                          )
                      ) 
                  !!}
              </div>
          </div>
          <div class='col-xs-12 col-md-6'>
              <div class="form-group" id="companiesForm">
                <label for="type">Tipo Documento:</label>
                  {!! Form::select('tipo_documento', $tipo_documento, null, ['class' => 'form-control', 'placeholder' => 'Seleccione']) !!}
              </div>
          </div>
          <div class='col-xs-12 col-md-6'>
              <div class="form-group">
                  <label for="email">Nro Documento:</label>
                  
                  {!! 
                      Form::text(
                          'nro_documento', 
                          null, 
                          array(
                              'class'=>'form-control',
                              //'required' => 'required'
                          )
                      ) 
                  !!}
              </div>
          </div>
          <div class='col-xs-12 col-md-6'>
              <div class="form-group">
                  <label for="email">Dirección:</label>
                  
                  {!! 
                      Form::text(
                          'direccion', 
                          null, 
                          array(
                              'class'=>'form-control',
                              //'required' => 'required'
                          )
                      ) 
                  !!}
              </div>
          </div>
          <div class='col-xs-12 col-md-6'>
              <div class="form-group">
                  <label for="email">Teléfono:</label>
                  
                  {!! 
                      Form::text(
                          'telefono', 
                          null, 
                          array(
                              'class'=>'form-control',
                              //'required' => 'required'
                          )
                      ) 
                  !!}
              </div>
          </div>
          <div class='col-xs-12 col-md-6'>
              <div class="form-group">
                  <label for="email">Representante:</label>
                  
                  {!! 
                      Form::text(
                          'representante', 
                          null, 
                          array(
                              'class'=>'form-control',
                              //'required' => 'required'
                          )
                      ) 
                  !!}
              </div>
          </div>             
          <div class='col-xs-12 col-md-6'>
              <div class="form-group">
                  <label for="type">Estado:</label><br>
                  <label class="radio-inline">
                      {!! Form::radio('estado', 1, true) !!} Activo
                  </label>
                  <label class="radio-inline">
                      {!! Form::radio('estado', 0) !!} Inactivo
                  </label>
              </div>
          </div>  
          <div class='col-sm-12'>
              <div class="form-group text-center">
                  {!! Form::submit('Guardar', array('class'=>'btn btn-success')) !!}
                  <a href="{{ route('admin.sucursales.index') }}" class="btn btn-danger">Cancelar</a>
              </div>
          </div>
      {!! Form::close() !!}

  </div>
@stop