<?php

namespace App\Http\Controllers\Cliente;

use Carbon\Carbon;
use App\Models\Pago;
use App\Models\Poliza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PagoController extends Controller
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

        return view('cliente.pago.index',['polizas'=>$polizas]);
    }

    public function pagar($id)
    {
        $poliza = Poliza::find($id);
        $pago = Pago::where('estado', 'Impaga')
            ->where('poliza_id', $poliza->id)
            ->orderBy('fecha_limite_pago')
            ->limit(1)
            ->first();
        return view('cliente.pago.pagar', ['poliza' => $poliza,'pago'=>$pago]);
    }

    public function metodopago(Request $request,$id)
    {
        $pago = Pago::find($id);

        if (request('metodo_pago')=='Qr')
            return view('cliente.pago.pagoqr',['pago'=>$pago]); 
        dd(request('metodo_pago'));
    }

    public function finalizarpagorqr($id,Request $request)
    {
        $pago = Pago::find($id);       
        $pago->estado='Pagado';
        $pago->metodo='Qr';
        $pago->fecha_pago= Carbon::now();;
     

        if ($request->hasFile('imagen')){
            $imagen=$request->file('imagen');
            $nombre = 'Qr'.(202*10+$id).'.'.$imagen->getClientOriginalExtension();
            $url=public_path('imagenes/comprobante/qr/');
            $request->imagen->move($url,$nombre);
            $pago->comprobante=$nombre;
        }

        $pago->update();

        $poliza = Poliza::select('polizas.*')
        ->join('pagos', 'polizas.id', '=', 'pagos.poliza_id')
        ->where('pagos.id', $pago->id)
        ->first();
        $poliza->activo =1;
        $poliza->update();


        return redirect('/cliente/pago');
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
        $poliza = Poliza::find($id);
        $pago = Pago::
        where('poliza_id', $poliza->id)
            ->get();
        return view('cliente.pago.show', ['pago'=>$pago]);
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
