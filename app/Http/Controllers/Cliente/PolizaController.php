<?php

namespace App\Http\Controllers\Cliente;

use Carbon\Carbon;
use App\Models\Pago;
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
        $fecha_actual = Carbon::now();
        return view('cliente.poliza.create',['coberturas'=>$coberturas,'vehiculos'=>$vehiculos,'fecha_actual'=>$fecha_actual]);
    }



    public function store(Request $request)
    {
        $poliza = new Poliza();
        $poliza->users_id =Auth::user()->id; 
        $poliza->nro_poliza =0;
        $poliza->fecha_inicio = request('fecha_inicio');
        $poliza->fecha_final = Carbon::createFromDate(request('fecha_inicio'))->addYears(request('anio'));
        $poliza->moneda = request('moneda');
        $poliza->tipo_pago = request('tipo_pago');

        $cobertura = Cobertura::all();
        $cobertura_selecionada = [];

        $prima_total = 0;
        foreach ($cobertura as $item){
            if (request()->has($item->id)) {
                $prima_total=$prima_total+$item->costo;
                $cobertura_selecionada[]=$item;              
            }
        }
        if($cobertura_selecionada == null)
                return redirect("cliente/poliza/create");

        $poliza->prima_neta = $prima_total;
        $poliza->iva = 13;
        $poliza->prima_total_anual = $prima_total+$prima_total*0.13 ;
        $poliza->prima_total =  $poliza->prima_total_anual*request('anio');
        $poliza->prima_total_semestral = ($prima_total+$prima_total*0.13)/2 ;
        $poliza->prima_total_mensual = ($prima_total+$prima_total*0.13)/12 ;
        $poliza->vehiculo_id = request('vehiculo');
        $poliza->estado = 1;
        $poliza->activo = 0;

        $poliza->save();

        $this->generatepagos(request('tipo_pago'),$poliza->prima_total,request('anio'),$poliza->id);
        $poliza->nro_poliza =2023*1000+$poliza->id; 
        $poliza->update();

        

        return redirect("cliente/poliza");
        
    }

    public function generatepagos($tipo,$monto_total,$anio,$id){
        if ($tipo=='m'){
            $monto_mensual=$monto_total/($anio*12);
            $fecha_actual=Carbon::now();
            for($i=1; $i<=($anio*12);$i++){
                $fecha_actual->addMonths(1); 
                $pago = new Pago();
                $pago->metodo = '';
                $pago->monto =$monto_mensual;
                $pago->tipo_pago ='Mensual';
                $pago->estado = 'Impaga';
                $pago->fecha_limite_pago=$fecha_actual;
                $pago->poliza_id = $id;
                $pago->users_id=Auth::user()->id;
                $pago->save();       
                       
            }
        }
        if ($tipo=='s'){
            $monto_semestral=$monto_total/($anio*2);
            $fecha_actual=Carbon::now();
            for($i=1; $i<=($anio*2);$i++){
                $fecha_actual->addMonths(6); 
                $pago = new Pago();
                $pago->metodo = '';
                $pago->monto =$monto_semestral;
                $pago->tipo_pago ='Semestral';
                $pago->fecha_limite_pago=$fecha_actual;
                $pago->estado = 'Impaga';
                $pago->poliza_id = $id;
                $pago->users_id=Auth::user()->id;
                $pago->save();               
            }
        }
        if ($tipo=='a'){
            $monto_anual=$monto_total/($anio);
            $fecha_actual=Carbon::now();
            for($i=1; $i<=($anio);$i++){
                $fecha_actual->addMonths(12); 
                $pago = new Pago();
                $pago->metodo = '';
                $pago->monto =$monto_anual;
                $pago->tipo_pago ='Anual';
                $pago->fecha_limite_pago=$fecha_actual;
                $pago->estado = 'Impaga';
                $pago->poliza_id = $id;
                $pago->users_id=Auth::user()->id;
                $pago->save();               
            }
        }
            
        
    }

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

    public function confirmar(Request $request)
    {
        $tipo_poliza = request('tipo_poliza');
        $fecha_inicio = request('fecha_inicio');
        $fecha_final = request('fecha_final');
        $moneda = request('moneda');
        $metodo_pago = request('metodo_pago');
        $prima_neta = request('prima_neta');
        $derecho_poliza = request('derecho_poliza');
        $iva = request('iva');
        $prima_total_anual = request('prima_total_anual');
        $vehiculo_id = request('vehiculo');


        $cobertura = Cobertura::all();
        $cobertura_selecionada = [];
        foreach ($cobertura as $item){
            if (request()->has($item->id)) {
                $cobertura_selecionada[]=$item;
            }
        }



        return view('cliente.poliza.confirmarpoliza',['coberturas'=>$cobertura_selecionada]);
    }
}
