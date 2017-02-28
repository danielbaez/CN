<?php

namespace SisVenta\Http\Controllers;

use Illuminate\Http\Request;

use SisVenta\Http\Requests;
use SisVenta\Http\Requests\ProveedorRequest;
use SisVenta\Http\Controllers\Controller;
use SisVenta\Sucursal;
use SisVenta\Documento;
use SisVenta\Proveedor;

class ProveedorController extends Controller
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
        $proveedores = Proveedor::all();

        return view('proveedores.index', compact('sucursal', 'proveedores'));
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
        $tipo_documento = Documento::where('operacion', 'Persona')->orderBy('id', 'desc')->lists('nombre', 'nombre');
        return view('proveedores.create', compact('sucursal', 'tipo_documento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProveedorRequest $request)
    {
        $proveedor = Proveedor::create([
            'nombre' => $request->get('nombre'),
            'apellido' => $request->get('apellido'),
            'tipo_persona' => 'proveedor',
            'tipo_documento' => $request->get('tipo_documento'),
            'nro_documento' => $request->get('nro_documento'),
            'direccion' => $request->get('direccion'),
            'telefono' => $request->get('telefono'),
            'email' => $request->get('email'),
            'estado' => $request->get('estado')
        ]);
        
        $message = $proveedor ? 'Proveedor agregado correctamente!' : 'El proveedor NO pudo agregarse!';
        
        return redirect()->route('admin.proveedores.index')->with('message', $message);
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
    public function edit($proveedor)
    {
        $id_sucursal = \Session::get('id_sucursal');
        $sucursal = Sucursal::where('id', $id_sucursal)->where('estado', 1)->get(); 
        $tipo_documento = Documento::where('operacion', 'Persona')->orderBy('id', 'desc')->lists('nombre', 'nombre');
        return view('proveedores.edit', compact('sucursal', 'proveedor', 'tipo_documento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProveedorRequest $request, $proveedor)
    {
        $proveedor->nombre = $request->get('nombre');
        $proveedor->apellido = $request->get('apellido');
        $proveedor->tipo_documento = $request->get('tipo_documento');
        $proveedor->nro_documento = $request->get('nro_documento');
        $proveedor->direccion = $request->get('direccion');
        $proveedor->telefono = $request->get('telefono');
        $proveedor->email = $request->get('email');
        $proveedor->estado = $request->get('estado');
        $updated = $proveedor->save();
        
        $message = $updated ? 'Proveedor actualizado correctamente!' : 'El proveedor NO pudo actualizarse!';
        
        return redirect()->route('admin.proveedores.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($proveedor)
    {
        $proveedor->estado = 0;
        $upd = $proveedor->save();
        $message = $upd ? 'Proveedor desactivado correctamente!' : 'El proveedor NO pudo descactivarse!';
        
        return redirect()->route('admin.proveedores.index')->with('message', $message);
    }
}
