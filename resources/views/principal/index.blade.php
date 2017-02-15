<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/lumen/bootstrap.min.css" rel="stylesheet" integrity="sha384-gv0oNvwnqzF6ULI9TVsSmnULNb3zasNysvWwfT/s4l8k5I+g6oFz9dye0wg3rQ2Q" crossorigin="anonymous">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
	<div class="container">

		<div class="row">
			
		  <div class="col-md-offset-1 col-md-10 lista-sucursales">
			        	<h3>SUCURSALES</h3>
			        	<a href="{{ route('logout') }}"class="btn btn-danger"><i class="fa fa-fw fa-power-off"></i> Cerrar Sesión</a>
			        	<div class="table-responsive">
				        	<table class="table table-hover">
				        		<thead>
				        			<tr>
				        				<th>#</th><th>Nombre</th><th>Representante</th><th>Operación</th>
				        			</tr>
				        		</thead>
				        		<tbody>
				        			@foreach($sucursales as $sucursal)
				        			<tr>
				        				<th scope="row">{{ $sucursal->id }}</th><td>{{ $sucursal->razon_social }}</td><td>{{ $sucursal->representante }}</td><td><button class="btn btn-primary">Ingresar</button></td>
				        			</tr>
				        			@endforeach
				        		</tbody>
				        	</table>
			        	</div>
			      </div>
		    
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>