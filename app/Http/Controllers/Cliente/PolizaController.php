<?php

namespace App\Http\Controllers\Cliente;

use App\Models\Poliza;
use App\Models\Cobertura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PolizaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $polizas = DB::table('polizas')
        ->where('users_id','=',Auth::user()->id)
        ->where('estado','=','1')  
        ->get();

        return view('cliente.poliza.index',['polizas'=>$polizas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $coberturas = DB::table('coberturas')->where('estado','=','1')->get();
       $vehiculos = DB::table('vehiculos')
        ->where('users_id','=',Auth::user()->id)
        ->where('estado','=','1')  
        ->get();
        return view('cliente.poliza.create',['coberturas'=>$coberturas,'vehiculos'=>$vehiculos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $poliza = new Poliza();

        $poliza->tipo_poliza = request('tipo_poliza');
        $poliza->fecha_inicio = request('fecha_inicio');
        $poliza->fecha_final = request('fecha_final');
        $poliza->moneda = request('moneda');
        $poliza->metodo_pago = request('metodo_pago');
        $poliza->prima_neta = request('prima_neta');
        $poliza->derecho_poliza = request('derecho_poliza');
        $poliza->iva = request('iva');
        $poliza->prima_total_anual = request('prima_total_anual');
        $poliza->vehiculo_id = request('vehiculo_id');
        $poliza->estado = 1;
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
