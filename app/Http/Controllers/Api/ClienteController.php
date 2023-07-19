<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Pago;
use App\Models\Poliza;
use App\Models\Vehiculo;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Cotizacion;
use Illuminate\Support\Facades\Auth;

use App\Models\Cobertura;

class ClienteController extends Controller
{

    use ApiResponder;
    /**
     * Handle the incoming request.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    //TODO: obtener la lista de vehiculos

    public function obtenerListaVehiculos()
    {
        $obtenerVehiculos = Vehiculo::where('users_id', Auth::user()->id)
            ->where('estado', 1)
            ->get();

        return $this->success(
            "listaVehiculos",
            $obtenerVehiculos->toArray(),
        );
    }


    //TODO: editar vehiculo
    public function editarVehiculo(Request $request)
    {


        $vehiculo = Vehiculo::find($request->id);

        $vehiculo->modelo = request('modelo');
        $vehiculo->marca = request('marca');
        $vehiculo->placa = request('placa');
        $vehiculo->combustible = request('combustible');
        $vehiculo->potencia = request('potencia');
        $vehiculo->altura = request('altura');
        $vehiculo->anchura = request('anchura');
        $vehiculo->nro_asiento = request('nro_asiento');
        $vehiculo->descripcion = request('descripcion');
        $vehiculo->estado = 1;

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombre = request('placa') . '.' . $imagen->getClientOriginalExtension();
            $url = public_path('imagenes/vehiculos');
            $request->imagen->move($url, $nombre);
            $vehiculo->imagen = $nombre;
            $vehiculo->path = "http://192.168.100.180:8000/imagenes/vehiculos/" . $nombre;
        }
        $vehiculo->update();

        return $this->success(
            "actualizadoVehiculo",
            $vehiculo->toArray(),
        );
    }



    public function eliminarVehiculo(Request $request)
    {
        $vehiculo = Vehiculo::find($request->id);
        $vehiculo->estado = 0;

        $vehiculo->update();
        return $this->success(
            "Eliminado",
            $vehiculo->toArray(),
        );
    }



    //TODO: APARTADO DE PAGOS DE CLIENTE

    public function ListarPagos()
    {

        $polizas = DB::table('polizas')
            ->where('users_id', '=', Auth::user()->id)
            ->where('estado', '=', '1')
            ->get();

        return $this->success(
            "ListaPagos",
            $polizas->toArray(),
        );
    }


    public function DetallePago(Request $request)
    {

        $poliza = Poliza::find($request->id);
        $pago = Pago::where('estado', 'Impaga')
            ->where('poliza_id', $poliza->id)
            ->orderBy('fecha_limite_pago')
            ->limit(1)
            ->first();

        return $this->success(
            "DetallePago",
            $pago->toArray(),
        );
    }

    public function realizarPago(Request $request)
    {
        $pago = Pago::find($request->id);
        $pago->estado = 'Pagado';
        $pago->metodo = 'Qr';
        $pago->fecha_pago = Carbon::now();


        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombre = 'Qr' . (202 * 10 + $request->id) . '.' . $imagen->getClientOriginalExtension();
            $url = public_path('imagenes/comprobante/qr/');
            $request->imagen->move($url, $nombre);
            $pago->comprobante = $nombre;
        }

        $pago->update();

        $poliza = Poliza::select('polizas.*')
            ->join('pagos', 'polizas.id', '=', 'pagos.poliza_id')
            ->where('pagos.id', $pago->id)
            ->first();
        $poliza->activo = 1;
        $poliza->update();

        return $this->success(
            "PagoRealizado",
            $pago->toArray(),
        );
    }


    //TODO: REALIZACION DE COTIZACION
    public function crearCotizacion(Request $request)
    {
        $cotizacion = new Cotizacion();

        $cotizacion->name = request('name');
        $cotizacion->email= request('email');
        $cotizacion->telefono = request('telefono');
        $cotizacion->marca = request('marca');
        $cotizacion->modelo = request('modelo');
        $cotizacion->anio = request('anio');
        
        $texto= request('cobertura').' : El seguro Cubrira  ';

        if(request('cobertura')== 'completa'){

            $coberturas = Cobertura::all();
            foreach ($coberturas as $covertura){
                $texto = $texto.' '.$covertura->nombre;
                $cotizacion->costo=$cotizacion->costo+ $covertura->costo;
            }         
        }else{
            if(request('cobertura')== 'terceros'){

                $coberturas = Cobertura::find(1);
                $texto = $texto.' '.$coberturas->nombre;
                $cotizacion->costo = $coberturas->costo;        
            }
        }     
        $cotizacion->cobertura = $texto;

        $cotizacion->save();
        return $this->success(
            "Creado Correctamente",

        );
    }
}
