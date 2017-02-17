@extends('template')
@section('content')
	<h3>Crear Empleado</h3>
	<div class="row">
        <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="nombre" id="nombre" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Apellido <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="apellido" name="apellido" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Documento <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="apellido" name="apellido" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nro Documento <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="apellido" name="apellido" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Dirección <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="apellido" name="apellido" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="apellido" name="apellido" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Teléfono <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="apellido" name="apellido" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Usuario <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="apellido" name="apellido" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Password <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="apellido" name="apellido" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Foto</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Activo</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div id="gender" class="btn-group" data-toggle="buttons">
                <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                  <input type="radio" name="gender" value="male" data-parsley-multiple="gender"> &nbsp; Si &nbsp;
                </label>
                <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                  <input type="radio" name="gender" value="female" data-parsley-multiple="gender"> No
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha de Nacimiento <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button class="btn btn-primary" type="button">Cancel</button>
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>

        </form>
	</div>

    <!-- <form class="form-horizontal">
  <div class="form-group">
    <label for="inputEmail3" class="col-xs-12 col-sm-2 control-label">Email</label>
    <div class="col-xs-12 col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="xol-xs-12 col-sm-2 control-label">Password</label>
    <div class="col-xs-12 col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Remember me
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Sign in</button>
    </div>
  </div>
</form> -->
    <div class="row" style="width: 80%;margin: 0 auto">
        @include('partials.errors')

        {!! Form::open() !!}
            <div class='col-xs-12 col-md-6'>
                <div class="form-group">
                    <label for="name">Nombres:</label>
                    
                    {!! 
                        Form::text(
                            'name', 
                            null, 
                            array(
                                'class'=>'form-control',
                                'placeholder' => 'Ingresa nombre...',
                                'autofocus' => 'autofocus',
                                //'required' => 'required'
                            )
                        ) 
                    !!}
                </div>
            </div>
            <div class='col-xs-12 col-md-6'>
                <div class="form-group">
                    <label for="email">Correo:</label>
                    
                    {!! 
                        Form::text(
                            'email', 
                            null, 
                            array(
                                'class'=>'form-control',
                                'placeholder' => 'Ingresa el correo...',
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
                    <label for="confirm_password">Confirmar Password:</label>
                    
                    {!! 
                        Form::password(
                            'password_confirmation',
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
                    <label for="type">Tipo:</label><br>
                    <label class="radio-inline">
                        {!! Form::radio('type', '1', true) !!} Administrador
                    </label>
                    <label class="radio-inline">
                        {!! Form::radio('type', '2') !!} Empleado
                    </label>
                    <label class="radio-inline">
                        {!! Form::radio('type', '3') !!} Cliente
                    </label>
                </div>
            </div>
             
            <div class='col-xs-12 col-md-6'>
                <div class="form-group">
                    <label for="type">País:</label><br>
                    <label class="radio-inline">
                        {!! Form::radio('country', 'pe', true) !!} Perú
                    </label>
                    <label class="radio-inline">
                        {!! Form::radio('country', 'mx') !!} México
                    </label>
                </div>
            </div>  
            <div class='col-xs-12 col-md-6'>
                <div class="form-group byType2">
                    <label for="type">Metodo de llamadas:</label><br>
                    <label class="radio-inline">
                        {!! Form::radio('method_call', 'web', true) !!} Web
                    </label>
                    <label class="radio-inline">
                        {!! Form::radio('method_call', 'mobile') !!} Mobile
                    </label>
                </div>
            </div>  
            <div class='col-xs-12 col-md-6'>
                <div class="form-group byType2">
                    <label for="name">Numero Perú:</label>
                    
                    {!! 
                        Form::text(
                            'phone_pe', 
                            null, 
                            array(
                                'class'=>'form-control',
                                'placeholder' => 'Ingresa su numero...',
                                //'required' => 'required'
                            )
                        ) 
                    !!}
                </div>
            </div> 
            <div class='col-xs-12 col-md-6'>
                <div class="form-group byType2">
                    <label for="name">Numero México:</label>
                    
                    {!! 
                        Form::text(
                            'phone_mx', 
                            null, 
                            array(
                                'class'=>'form-control',
                                'placeholder' => 'Ingresa su numero...',
                                //'required' => 'required'
                            )
                        ) 
                    !!}
                </div>
            </div>      
            <div class='col-xs-12 col-md-6'>    
                <div class="form-group">
                    <label for="active">Activo:</label>
                    
                    {!! Form::checkbox('active', null, true) !!}
                </div>
            </div>    
            <div class='col-sm-12'>
                <div class="form-group text-center">
                    {!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
                </div>
            </div>
        {!! Form::close() !!}

    </div>
@stop