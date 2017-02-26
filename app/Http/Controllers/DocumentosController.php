<?php

namespace SisVenta\Http\Controllers;

use Illuminate\Http\Request;

use SisVenta\Http\Requests;
use SisVenta\Http\Requests\DocumentoRequest;
use SisVenta\Http\Controllers\Controller;
use SisVenta\Sucursal;
use SisVenta\Documento;

class DocumentosController extends Controller
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
        $documentos = Documento::all();

        return view('documentos.index', compact('sucursal', 'documentos'));
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
        $tipo = array('Persona' =>'Persona', 'Proveedor' => 'Proveedor');
        return view('documentos.create', compact('sucursal', 'tipo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentoRequest $request)
    {
        $documento = Documento::create([
            'nombre' => $request->get('nombre'),
            'operacion' => $request->get('operacion'),
            'estado' => $request->get('estado')
        ]);
        
        $message = $documento ? 'Documento agregado correctamente!' : 'El documento NO pudo agregarse!';
        
        return redirect()->route('admin.documentos.index')->with('message', $message);
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
    public function edit($documento)
    {
        $id_sucursal = \Session::get('id_sucursal');
        $sucursal = Sucursal::where('id', $id_sucursal)->where('estado', 1)->get(); 
        $tipo = array('Persona' =>'Persona', 'Proveedor' => 'Proveedor');
        return view('documentos.edit', compact('sucursal', 'documento', 'tipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentoRequest $request, $documento)
    {
        $documento->nombre = $request->get('nombre');
        $documento->operacion = $request->get('operacion');
        $documento->estado = $request->get('estado');
        $updated = $documento->save();
        
        $message = $updated ? 'Documento actualizado correctamente!' : 'El documento NO pudo actualizarse!';
        
        return redirect()->route('admin.documentos.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($documento)
    {
        $documento->estado = 0;
        $upd = $documento->save();
        $message = $upd ? 'Documento desactivado correctamente!' : 'El documento NO pudo descactivarse!';
        
        return redirect()->route('admin.documentos.index')->with('message', $message);
    }
}
