@extends('template')
@section('content')
	<h3>Editar Empleado</h3>
  <div class="row" style="width: 85%;margin: 0 auto">
      @include('partials.errors')

      {!! Form::model($empleado, array('route' => array('admin.empleados.update', $empleado), 'files'=>true)) !!}
          <input type="hidden" name="_method" value="PUT">
          <div class='col-xs-12 col-md-6'>
              <div class="form-group">
                  <label for="name">Nombre:</label>
                  
                  {!! 
                      Form::text(
                          'nombre', 
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
              <div class="form-group">
                  <label for="email">Apellido:</label>
                  
                  {!! 
                      Form::text(
                          'apellido', 
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
                  <label for="email">Fecha Nacimiento:</label>
                  
                  {!! 
                      Form::text(
                          'fecha_nacimiento', 
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
                  <label for="email">Email:</label>
                  
                  {!! 
                      Form::text(
                          'email', 
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
                  <label for="email">Usuario:</label>
                  
                  {!! 
                      Form::text(
                          'usuario', 
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
                  <label for="password">Password:</label>
                  
                  {!! 
                      Form::password(
                          'password', 
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
                  <label for="email">Foto:</label>
                  @if(is_file(public_path().'/images/empleados/'.$empleado->foto))
                      <img class="img-circle" width="120px" height="120px" style="display:block;margin: 0 auto;margin-bottom: 10px;" src="{{asset('images/empleados/'.$empleado->foto)}}">
                  @endif
                  {!! 
                      Form::file(
                          'foto', 
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
                  <a href="{{ route('admin.empleados.index') }}" class="btn btn-danger">Cancelar</a>
              </div>
          </div>
      {!! Form::close() !!}

  </div>
@stop