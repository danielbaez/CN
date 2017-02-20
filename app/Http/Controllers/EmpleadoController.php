<?php

namespace SisVenta\Http\Controllers;

use Illuminate\Http\Request;

use SisVenta\Http\Requests;
use SisVenta\Http\Controllers\Controller;

use SisVenta\Sucursal;
use SisVenta\User;

class EmpleadoController extends Controller
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

        $empleados = User::all();

        return view('empleados.index', compact('sucursal', 'empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_sucursal = \Session::get('id_sucursal');
        /*$session = new Session();
        $id_sucursal = $session->get('id_sucursal');*/

        $sucursal = Sucursal::where('id', $id_sucursal)->where('estado', 1)->get(); 
        $tipo_documento = array('dni' =>'DNI', 'ruc' => 'RUC');
        return view('empleados.create', compact('sucursal', 'tipo_documento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request, [
            'nombre'      => 'required|max:50',
            'apellido'      => 'required|max:50',
            'tipo_documento'      => 'required|in:dni,ruc',
            'nro_documento'      => 'required|max:20',
            'fecha_nacimiento'      => 'required',
            'direccion'      => 'required|max:100',
            'telefono'      => 'required|max:10',
            'email'     => 'required|email',
            'usuario'     => 'required',
            'password'  => 'required|max:20',
            'estado'      => 'required|in:1,0'
        ]);

        $empleado = User::create([
            'nombre' => $request->get('nombre'),
            'apellido' => $request->get('apellido'),
            'tipo_documento' => $request->get('tipo_documento'),
            'nro_documento' => $request->get('nro_documento'),
            'fecha_nacimiento' => $request->get('fecha_nacimiento'),
            'direccion' => $request->get('direccion'),
            'telefono' => $request->get('telefono'),
            'email' => $request->get('email'),
            'usuario' => $request->get('usuario'),
            'password' => \Hash::make($request->get('password')),
            'estado' => $request->get('estado'),
            'foto' => $request->get('foto')
        ]);
        
        $message = $empleado ? 'Empleado agregado correctamente!' : 'El emplelado NO pudo agregarse!';
        
        return redirect()->route('admin.empleados.index')->with('message', $message);
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
    public function edit($id)
    {
        $id_sucursal = \Session::get('id_sucursal');
        $sucursal = Sucursal::where('id', $id_sucursal)->where('estado', 1)->get(); 
        $empleado = User::find($id);
        $tipo_documento = array('dni' =>'DNI', 'ruc' => 'RUC');
        return view('empleados.edit', compact('sucursal', 'empleado', 'tipo_documento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $empleado = User::find($id);
        
        $this->validate($request, [
            'nombre'      => 'required|max:50',
            'apellido'      => 'required|max:50',
            'tipo_documento'      => 'required|in:dni,ruc',
            'nro_documento'      => 'required|max:20',
            'fecha_nacimiento'      => 'required',
            'direccion'      => 'required|max:100',
            'telefono'      => 'required|max:10',
            'email'     => 'required|email',
            'usuario'     => 'required',
            'estado'      => 'required|in:1,0'
        ]);
      
        $empleado->nombre = $request->get('nombre');
        $empleado->apellido = $request->get('apellido');
        $empleado->tipo_documento = $request->get('tipo_documento');
        $empleado->nro_documento = $request->get('nro_documento');
        $empleado->fecha_nacimiento = $request->get('fecha_nacimiento');
        $empleado->direccion = $request->get('direccion');
        $empleado->telefono = $request->get('telefono');
        $empleado->email = $request->get('email');
        $empleado->usuario = $request->get('usuario');
        if($request->get('password') != ""){
            $empleado->password = \Hash::make($request->get('password'));
        }       
        $empleado->estado = $request->get('estado');
        $updated = $empleado->save();
        
        $message = $updated ? 'Empleado actualizado correctamente!' : 'El empleado NO pudo actualizarse!';
        
        return redirect()->route('admin.empleados.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
