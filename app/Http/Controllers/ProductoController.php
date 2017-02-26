<?php

namespace SisVenta\Http\Controllers;

use Illuminate\Http\Request;

use SisVenta\Http\Requests;
use SisVenta\Http\Controllers\Controller;
use SisVenta\Http\Requests\ProductoRequest;
use SisVenta\Sucursal;
use SisVenta\Producto;
use SisVenta\Categoria;
use DB;

class ProductoController extends Controller
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
        $productos = Producto::all();

        $productos = DB::table('productos')
            ->join('categorias', 'productos.id_categoria', '=', 'categorias.id')
            ->where('categorias.estado', 1)
            //->where('productos.estado', 1)
            ->select('productos.*', 'categorias.nombre as categoria')
            ->get();

        return view('productos.index', compact('sucursal', 'productos'));
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
        $categorias = Categoria::where('estado', 1)->orderBy('id', 'desc')->lists('nombre', 'id');
        return view('productos.create', compact('sucursal', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoRequest $request)
    {
        //dd($request);
        //echo $request->file('imagen')->getClientOriginalExtension();
        //echo $request->file('imagen')->getClientOriginalName();
        //dd($request->file('imagen'));
        $producto = Producto::create([
            'id_categoria' => $request->get('id_categoria'),
            'nombre' => $request->get('nombre'),
            'nro_documento' => $request->get('nro_documento'),
            'descripcion' => $request->get('descripcion'),
            'estado' => $request->get('estado')
        ]);

        if($request->file('imagen'))
        {
            $imageName = $producto->id.'_'.$request->file('imagen')->getClientOriginalName(); 
            //$request->file('imagen')->getClientOriginalExtension();

            $request->file('imagen')->move(
                base_path() . '/public/images/productos/', $imageName
            );

            $producto->imagen = $producto->id.'_'.$request->file('imagen')->getClientOriginalName(); 
            $producto->save();
        }
        
        $message = $producto ? 'Producto agregado correctamente!' : 'El producto NO pudo agregarse!';
        
        return redirect()->route('admin.productos.index')->with('message', $message);
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
    public function edit($producto)
    {
        $id_sucursal = \Session::get('id_sucursal');
        $sucursal = Sucursal::where('id', $id_sucursal)->where('estado', 1)->get(); 
        $categorias = Categoria::where('estado', 1)->orderBy('id', 'desc')->lists('nombre', 'id');
        return view('productos.edit', compact('sucursal', 'producto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoRequest $request, $producto)
    {
        if($request->file('imagen'))
        {
            \File::delete(base_path() . '/public/images/productos/'. $producto->imagen);
            $imageName = $producto->id.'_'.$request->file('imagen')->getClientOriginalName();
            $producto->imagen = $imageName;
            $request->file('imagen')->move(
                base_path() . '/public/images/productos/', $imageName
            );
        }
        
        $producto->id_categoria = $request->get('id_categoria');
        $producto->nombre = $request->get('nombre');
        $producto->descripcion = $request->get('descripcion');
        $producto->estado = $request->get('estado');
        $updated = $producto->save();
        
        $message = $updated ? 'Producto actualizado correctamente!' : 'El producto NO pudo actualizarse!';
        
        return redirect()->route('admin.productos.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($producto)
    {
        $producto->estado = 0;
        $upd = $producto->save();
        $message = $upd ? 'Producto desactivado correctamente!' : 'El producto NO pudo descactivarse!';
        
        return redirect()->route('admin.productos.index')->with('message', $message);
    }
}
