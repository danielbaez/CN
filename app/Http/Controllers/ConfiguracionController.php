<?php

namespace SisVenta\Http\Controllers;

use Illuminate\Http\Request;

use SisVenta\Http\Requests;
use SisVenta\Http\Controllers\Controller;
use SisVenta\Http\Requests\ConfiguracionRequest;
use SisVenta\Sucursal;
use SisVenta\Configuracion;

class ConfiguracionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_sucursal = \Session::get('id_sucursal');

        $sucursal = Sucursal::where('id', $id_sucursal)->where('estado', 1)->get();
        $configuracion = Configuracion::all();

        return view('configuracion.index', compact('sucursal', 'configuracion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($configuracion)
    {
        $id_sucursal = \Session::get('id_sucursal');
        $sucursal = Sucursal::where('id', $id_sucursal)->where('estado', 1)->get(); 
        return view('configuracion.edit', compact('sucursal', 'configuracion', 'tipo_documento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ConfiguracionRequest $request, $configuracion)
    {
        if($request->file('logo'))
        {
            \File::delete(base_path() . '/public/images/'. $configuracion->logo);
            $imageName = 'logo.png';
            $configuracion->logo = $imageName;
            $request->file('logo')->move(
                base_path() . '/public/images/', $imageName
            );
        }
        $configuracion->empresa = $request->get('empresa');
        $configuracion->nom_impuesto = $request->get('nom_impuesto');
        $configuracion->por_impuesto = $request->get('por_impuesto');
        $configuracion->moneda = $request->get('moneda');
        $updated = $configuracion->save();
        
        $message = $updated ? 'Configuración actualizado correctamente!' : 'La configuración NO pudo actualizarse!';
        
        return redirect()->route('admin.configuracion.index')->with('message', $message);
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
