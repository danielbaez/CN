@extends('template')
@section('content')
    <h3>Editar Categoría</h3>
  <div class="row" style="width: 85%;margin: 0 auto">
      @include('partials.errors')

      {!! Form::model($categoria, array('route' => array('admin.categorias.update', $categoria))) !!}
          <input type="hidden" name="_method" value="PUT">
          <div class='col-xs-12'>
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
          <div class='col-xs-12'>
              <div class="form-group">
                  <label for="name">Descripción:</label>
                  
                  {!! 
                      Form::textarea(
                          'descripcion', 
                          null, 
                          array(
                              'class'=>'form-control',
                              'size'=>'30x4'
                              //'required' => 'required'
                          )
                      ) 
                  !!}
              </div>
          </div>
          <div class='col-xs-12'>
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
                  <a href="{{ route('admin.categorias.index') }}" class="btn btn-danger">Cancelar</a>
              </div>
          </div>
      {!! Form::close() !!}

  </div>
@stop