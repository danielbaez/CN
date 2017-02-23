<?php

namespace SisVenta\Http\Controllers;

use Illuminate\Http\Request;

use SisVenta\Http\Requests;
use SisVenta\Http\Controllers\Controller;
use SisVenta\Http\Requests\UsuarioRequest;
use SisVenta\Usuario;
use SisVenta\User;
use SisVenta\Sucursal;
use DB;
class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_sucursal = \Session::get('id_sucursal');
        /*$session = new Session();
        $id_sucursal = $session->get('id_sucursal');*/

        $sucursal = Sucursal::where('id', $id_sucursal)->where('estado', 1)->get();
        ///
        $usuarios = DB::table('usuarios')
            ->join('empleados', 'usuarios.id_empleado', '=', 'empleados.id')
            ->join('sucursales', 'usuarios.id_sucursal', '=', 'sucursales.id')
            ->select('usuarios.*', 'empleados.usuario', 'sucursales.razon_social')
            ->get();
        if($usuarios){
            //dd($usuarios);
            return view('usuarios.index', compact('sucursal', 'usuarios'));
        }
        else{
            $mensaje = 'No hay usuarios';
            return view('usuarios.index', compact('sucursal', 'message'));
        }
        ///

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_sucursal = \Session::get('id_sucursal');

        $sucursal = Sucursal::where('id', $id_sucursal)->where('estado', 1)->get(); 
        $tipo_usuario = array('administrador' =>'Administrador', 'empleado' => 'Empleado');
        $empleados = User::orderBy('id', 'desc')->lists('nombre', 'id');
        $sucursales = Sucursal::orderBy('id', 'desc')->lists('razon_social', 'id');
        return view('usuarios.create', compact('sucursal', 'tipo_usuario', 'empleados', 'sucursales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {
        $sucursal = Usuario::create([
            'id_empleado' => $request->get('id_empleado'),
            'id_sucursal' => $request->get('id_sucursal'),
            'tipo_usuario' => $request->get('tipo_usuario'),
            'estado' => $request->get('estado')
        ]);
        
        $message = $sucursal ? 'Usuario agregado correctamente!' : 'El usuario NO pudo agregarse!';
        
        return redirect()->route('admin.usuarios.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($usuario)
    {
        $id_sucursal = \Session::get('id_sucursal');

        $sucursal = Sucursal::where('id', $id_sucursal)->where('estado', 1)->get(); 
        $tipo_usuario = array('administrador' =>'Administrador', 'empleado' => 'Empleado');
        $empleados = User::orderBy('id', 'desc')->lists('nombre', 'id');
        $sucursales = Sucursal::orderBy('id', 'desc')->lists('razon_social', 'id');
        return view('usuarios.edit', compact('usuario', 'sucursal', 'tipo_usuario', 'empleados', 'sucursales'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioRequest $request, $usuario)
    {
        $usuario->id_empleado = $request->get('id_empleado');
        $usuario->id_sucursal = $request->get('id_sucursal');
        $usuario->tipo_usuario = $request->get('tipo_usuario');
        $usuario->estado = $request->get('estado');
        $updated = $usuario->save();
        
        $message = $updated ? 'Usuario actualizado correctamente!' : 'El usuario NO pudo actualizarse!';
        
        return redirect()->route('admin.usuarios.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($usuario)
    {
        $usuario->estado = 0;
        $upd = $usuario->save();
        $message = $upd ? 'Usuario desactivado correctamente!' : 'El usuario NO pudo descactivarse!';
        
        return redirect()->route('admin.usuarios.index')->with('message', $message);
    }
}
