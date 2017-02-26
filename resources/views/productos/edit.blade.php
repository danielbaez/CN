@extends('template')
@section('content')
	<h3>Editar Producto</h3>
  <div class="row" style="width: 85%;margin: 0 auto">
      @include('partials.errors')

      {!! Form::model($producto, array('route' => array('admin.productos.update', $producto), 'files'=>true)) !!}
          <input type="hidden" name="_method" value="PUT">
          <div class='col-xs-12 col-md-6'>
              <div class="form-group" id="companiesForm">
                <label for="type">Categoría:</label>
                  {!! Form::select('id_categoria', $categorias, null, ['class' => 'form-control', 'placeholder' => 'Seleccione']) !!}
              </div>
          </div>
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
          <div class='col-xs-12'>
              <div class="form-group">
                  <label for="email">Descripción:</label>
                  
                  {!! 
                      Form::textarea(
                          'descripcion', 
                          null, 
                          array(
                              'class'=>'form-control',
                              //'required' => 'required'
                              'size' => '10x3'
                          )
                      ) 
                  !!}
              </div>
          </div>
          <div class='col-xs-12 col-md-6'>
              
              <div class="form-group">
                  <label for="email">Imagen:</label>
                  @if(is_file(public_path().'/images/productos/'.$producto->imagen))
                      <img class="img-circle" width="120px" height="120px" style="display:block;margin: 0 auto;margin-bottom: 10px;" src="{{asset('images/productos/'.$producto->imagen)}}">
                  @endif
                  {!! 
                      Form::file(
                          'imagen', 
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
                  <a href="{{ route('admin.productos.index') }}" class="btn btn-danger">Cancelar</a>
              </div>
          </div>
      {!! Form::close() !!}

  </div>
@stop