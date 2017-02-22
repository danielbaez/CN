<?php

namespace SisVenta\Http\Controllers;

use Illuminate\Http\Request;

use SisVenta\Http\Requests;
use SisVenta\Http\Requests\SucursalRequest;
use SisVenta\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use SisVenta\Usuario;
use SisVenta\Sucursal;

use DB;

class SucursalController extends Controller
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
        $sucursales = Sucursal::all();

        return view('sucursales.index', compact('sucursal', 'sucursales'));
    }

    public function lista()
    {
        \Session::forget('id_sucursal');
        $sucursales = DB::table('usuarios')
            ->join('sucursales', 'usuarios.id_sucursal', '=', 'sucursales.id')
            ->where('usuarios.estado', 1)
            ->where('sucursales.estado', 1)
            ->where('usuarios.id_empleado', Auth::user()->id)
            //->select('usuarios.*', 'sucursales.*')
            ->select('sucursales.*')
            ->get();
        if($sucursales){
            //$sucursales = Sucursal::where('estado', 1)->get();    
            return View('principal.index2', compact('sucursales'));
        }
        else{
        $mensaje = 'No hay usuarios o sucursales asociados a este empleado';
        $sucursales = false;
        return View('principal.index2', compact('mensaje', 'sucursales'));   
        }
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
        $tipo_documento = array('dni' =>'DNI', 'ruc' => 'RUC');
        return view('sucursales.create', compact('sucursal', 'tipo_documento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SucursalRequest $request)
    {
        $sucursal = Sucursal::create([
            'razon_social' => $request->get('razon_social'),
            'tipo_documento' => $request->get('tipo_documento'),
            'nro_documento' => $request->get('nro_documento'),
            'direccion' => $request->get('direccion'),
            'telefono' => $request->get('telefono'),
            'representante' => $request->get('representante'),
            'estado' => $request->get('estado')
        ]);
        
        $message = $sucursal ? 'Sucursal agregado correctamente!' : 'La sucursal NO pudo agregarse!';
        
        return redirect()->route('admin.sucursales.index')->with('message', $message);
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
    public function edit($sucursalOne)
    {
        $id_sucursal = \Session::get('id_sucursal');
        $sucursal = Sucursal::where('id', $id_sucursal)->where('estado', 1)->get(); 
        $tipo_documento = array('dni' =>'DNI', 'ruc' => 'RUC');
        return view('sucursales.edit', compact('sucursal', 'sucursalOne', 'tipo_documento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SucursalRequest $request, $sucursal)
    {
        $sucursal->razon_social = $request->get('razon_social');
        $sucursal->tipo_documento = $request->get('tipo_documento');
        $sucursal->nro_documento = $request->get('nro_documento');
        $sucursal->direccion = $request->get('direccion');
        $sucursal->telefono = $request->get('telefono');
        $sucursal->representante = $request->get('representante');
        $sucursal->estado = $request->get('estado');
        $updated = $sucursal->save();
        
        $message = $updated ? 'Sucursal actualizado correctamente!' : 'La sucursal NO pudo actualizarse!';
        
        return redirect()->route('admin.sucursales.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($sucursal)
    {
        $sucursal->estado = 0;
        $upd = $sucursal->save();
        $message = $upd ? 'Sucursal desactivado correctamente!' : 'La sucursal NO pudo descactivarse!';
        
        return redirect()->route('admin.sucursales.index')->with('message', $message);
    }
}
