<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



// User dependency injection
Route::bind('empleados', function($user){
	//dd(SisVenta\User::find($user));
    return SisVenta\User::find($user);
});

Route::bind('sucursales', function($sucursal){
	//dd(SisVenta\User::find($user));
    return SisVenta\Sucursal::find($sucursal);
});

Route::bind('usuarios', function($usuario){
	//dd(SisVenta\User::find($user));
    return SisVenta\Usuario::find($usuario);
});

Route::get('auth/login', [
	'as' => 'login-get',
	'uses' => 'Auth\AuthController@getLogin'
	]);

Route::post('auth/login', [
	'as' => 'login-post',
	'uses' => 'Auth\AuthController@postLogin'
]);

Route::get('auth/logout', [
	'as' => 'logout',
	'uses' => 'Auth\AuthController@getLogout'
]);

Route::group(['middleware' => ['auth', 'no-cache'], 'prefix'=>'admin'], function () {
    
	Route::get('/listaSucursales', ['as' => 'home','uses' => 'SucursalController@lista']);

	Route::get('/listaSucursales/{id_sucursal}', ['as' => 'irSucurcal', 'uses' => 'HomeController@irSucurcal']);

	Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'HomeController@dashboard', 'middleware' => 'sucursal']);

	//Route::get('/empleados', ['as' => 'empleados', 'uses' => 'EmpleadoController@index']);

	Route::group(['middleware' => 'sucursal'], function()
	{
	    //Route::resource('todo', 'TodoController', ['only' => ['index']]);
	    Route::resource('empleados', 'EmpleadoController');
	    Route::resource('sucursales', 'SucursalController');
	    Route::resource('usuarios', 'UsuarioController');
	});

	//Route::resource('empleados', 'EmpleadoController', ['middleware' => 'sucursal']);

	// Route::group( ['middleware' => ['administrador']], function() {
	// 	Route::resource('user', 'UserController');	
	// });

	// Route::group( ['middleware' => ['agente']], function() {
	// 	Route::get('/calls', ['as' => 'calls', 'uses' => 'CallController@index']);
	// 	Route::get('/repcot', ['as' => 'repcot', 'uses' => 'CallController@repcot']);
	// 	Route::post('/calls/operation', ['as' => 'calls-operation', 'uses' => 'CallController@operation']);
	// 	Route::get('/calls/ajax', ['as' => 'calls-ajax', 'uses' => 'CallController@calllAjax']);
	// });

});