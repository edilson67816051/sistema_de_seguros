<?php

namespace App\Http\Controllers\Cliente;

use App\Models\Bitacora;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Detalle;

use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class VehiculoController extends Controller
{
       public function index()
    {
        $vehiculos = DB::table('vehiculos')
        ->where('users_id','=',Auth::user()->id)
        ->where('estado','=','1')
        ->get();

        $bitacora = new Bitacora();
        $bitacora->bitacora('visito los vehiculos');
        
        return view('cliente.vehiculo.index',['vehiculos'=>$vehiculos]);
    }

    public function create()
    {
        return view('cliente.vehiculo.create');
    }

    public function store(Request $request)
    {
        $vehiculo = new Vehiculo();

        $vehiculo->modelo = request('modelo');
        $vehiculo->users_id = Auth::user()->id;
        $vehiculo->marca = request('marca');
        $vehiculo->placa = request('placa');
        $vehiculo->combustible = request('combustible');
        $vehiculo->potencia = request('potencia');
        $vehiculo->altura = request('altura');
        $vehiculo->anchura = request('anchura');
        $vehiculo->nro_asiento = request('nro_asiento');
        $vehiculo->descripcion = request('descripcion');
        $vehiculo->estado = 1;


        if ($request->hasFile('imagen')){
            $imagen=$request->file('imagen');
            $nombre = request('placa').'.'.$imagen->getClientOriginalExtension();
            $url=public_path('imagenes/vehiculos');
            $request->imagen->move($url,$nombre);
            $vehiculo->imagen=$nombre;
            $vehiculo->path="http://192.168.100.180:8000/imagenes/vehiculos/".$nombre;
        }
        $vehiculo->save();
        $bitacora = new Bitacora();
        $bitacora->bitacora('Creo un nuevo vehiculos');
        return redirect('/cliente/vehiculo');
    }

    public function show($id)
    {

    }


    public function edit($id)
    {
        $vehiculo = Vehiculo::find($id);
        return view('cliente.vehiculo.edit',['vehiculo'=>$vehiculo]);
    }

    public function update(Request $request, $id)
    {
        $vehiculo = Vehiculo::find($id);

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

        if ($request->hasFile('imagen')){
            $imagen=$request->file('imagen');
            $nombre = request('placa').'.'.$imagen->getClientOriginalExtension();
            $url=public_path('imagenes/vehiculos');
            $request->imagen->move($url,$nombre);
            $vehiculo->imagen=$nombre;
            $vehiculo->path="http://192.168.100.180:8000/imagenes/vehiculos/".$nombre;

        }
        $vehiculo->update();

        $bitacora = new Bitacora();
        $bitacora->bitacora('Modifico un vehiculos');
        
        return redirect('/cliente/vehiculo');
    }

    public function destroy($id)
    {
        $vehiculo = Vehiculo::find($id);
        $vehiculo -> estado=0;

        $vehiculo->update();

        $bitacora = new Bitacora();
        $bitacora->bitacora('Elimino un vehiculo');

        return redirect()->route('vehiculo.index');
    }

    
}
