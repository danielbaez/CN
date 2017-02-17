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
        return view('empleados.create', compact('sucursal'));
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
