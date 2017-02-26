@extends('template')
@section('content')
	<h3>Editar Usuario</h3>
  <div class="row" style="width: 85%;margin: 0 auto">
      @include('partials.errors')

      {!! Form::model($configuracion, array('route' => array('admin.configuracion.update', $configuracion), 'files'=>true)) !!}
          <input type="hidden" name="_method" value="PUT">
          <div class='col-xs-12 col-md-6'>
              <div class="form-group">
                  <label for="email">Empresa:</label>
                  
                  {!! 
                      Form::text(
                          'empresa', 
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
                  <label for="email">Impuesto:</label>
                  
                  {!! 
                      Form::text(
                          'nom_impuesto', 
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
                  <label for="email">Porcentaje:</label>
                  
                  {!! 
                      Form::text(
                          'por_impuesto', 
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
                  <label for="email">Moneda:</label>
                  
                  {!! 
                      Form::text(
                          'moneda', 
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
                  <label for="email">Logo:</label>
                  <img class="img-responsive" width="200px" style="display:block;margin: 0 auto;margin-bottom: 10px;" src="{{asset('images/logo.png')}}">
                  {!! 
                      Form::file(
                          'logo', 
                          array(
                              'class'=>'form-control',
                              //'required' => 'required'
                          )
                      ) 
                  !!}
              </div>
          </div>   
          <div class='col-sm-12'>
              <div class="form-group text-center">
                  {!! Form::submit('Guardar', array('class'=>'btn btn-success')) !!}
                  <a href="{{ route('admin.configuracion.index') }}" class="btn btn-danger">Cancelar</a>
              </div>
          </div>
      {!! Form::close() !!}

  </div>
@stop