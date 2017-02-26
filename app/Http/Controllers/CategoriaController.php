<?php

namespace SisVenta\Http\Controllers;

use Illuminate\Http\Request;

use SisVenta\Http\Requests;
use SisVenta\Http\Requests\CategoriaRequest;
use SisVenta\Http\Controllers\Controller;

use SisVenta\Sucursal;
use SisVenta\Categoria;

class CategoriaController extends Controller
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
        $categorias = Categoria::all();

        return view('categorias.index', compact('sucursal', 'categorias'));
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
        return view('categorias.create', compact('sucursal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaRequest $request)
    {
        $documento = Categoria::create([
            'nombre' => $request->get('nombre'),
            'descripcion' => $request->get('descripcion'),
            'estado' => $request->get('estado')
        ]);
        
        $message = $documento ? 'Categoría agregado correctamente!' : 'La categoría NO pudo agregarse!';
        
        return redirect()->route('admin.categorias.index')->with('message', $message);
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
    public function edit($categoria)
    {
        $id_sucursal = \Session::get('id_sucursal');
        $sucursal = Sucursal::where('id', $id_sucursal)->where('estado', 1)->get(); 
        return view('categorias.edit', compact('sucursal', 'categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriaRequest $request, $categoria)
    {
        $categoria->nombre = $request->get('nombre');
        $categoria->descripcion = $request->get('descripcion');
        $categoria->estado = $request->get('estado');
        $updated = $categoria->save();
        
        $message = $updated ? 'Categoría actualizado correctamente!' : 'La categoría NO pudo actualizarse!';
        
        return redirect()->route('admin.categorias.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($categoria)
    {
        $categoria->estado = 0;
        $upd = $categoria->save();
        $message = $upd ? 'Categoría desactivado correctamente!' : 'La categoría NO pudo descactivarse!';
        
        return redirect()->route('admin.categorias.index')->with('message', $message);
    }
}
