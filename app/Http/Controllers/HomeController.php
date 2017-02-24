<?php

namespace SisVenta\Http\Controllers;

use Illuminate\Http\Request;

use SisVenta\Http\Requests;
use SisVenta\Http\Controllers\Controller;

use SisVenta\Sucursal;

//use Symfony\Component\HttpFoundation\Session\Session;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function irSucurcal($id_sucursal)
    {
        $sucursal = Sucursal::where('id', $id_sucursal)->where('estado', 1)->get(); 
        
        if(!$sucursal->isEmpty()){
            \Session::put('id_sucursal', $id_sucursal);
            /*$session = new Session();
            $session->set('id_sucursal', $id_sucursal);*/
            return \Redirect::to('/admin/dashboard');  
        }
        else{
            return \Redirect::to('/admin/listaSucursales');
        }
        //return View('template', compact('sucursal'));
         
    }

    public function dashboard()
    {
        $id_sucursal = \Session::get('id_sucursal');
        /*$session = new Session();
        $id_sucursal = $session->get('id_sucursal');*/

        $sucursal = Sucursal::where('id', $id_sucursal)->where('estado', 1)->get(); 
        return View('template', compact('sucursal'));
         
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
