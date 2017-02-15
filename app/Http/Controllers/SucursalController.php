<?php

namespace SisVenta\Http\Controllers;

use Illuminate\Http\Request;

use SisVenta\Http\Requests;
use SisVenta\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use SisVenta\Usuario;
use SisVenta\Sucursal;

class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function lista()
    {
        $users = Usuario::where('id_empleado', Auth::user()->id)->where('estado', 1)->get();
        if(!$users->isEmpty()){
            //$verificarSucursal = Sucursal::where('id', $users)->get();
            $sucursales = Sucursal::where('estado', 1)->get();    
            return View('principal.index2', compact('sucursales'));
        }
        else{
        dd('no hay usuarios asociados a este empleado');   
        }
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
    public function edit($id)
    {
        //
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
        //
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
