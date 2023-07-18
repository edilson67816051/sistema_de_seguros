<?php

namespace App\Http\Controllers\admin;

use App\Models\Detalle;
use App\Models\Vehiculo;
use App\Models\Siniestro;
use App\Models\Evaluacion;
use Illuminate\Http\Request;
use App\Models\Campo_evaluacion;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EvaluacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {       
        $evaluaciones = Evaluacion::all();
        $datos = [];

        foreach ($evaluaciones as $evaluacion) {
            $campo = Campo_evaluacion::find($evaluacion->id);
            $item = [
                'id' => $evaluacion->id,
                'siniestro_id' => $evaluacion->siniestro_id,
                'name' => $campo->nombre,
                'descripcion' => $campo->descripcion,
                'fecha' => $campo->created_at,
            ];
            $datos[] = $item;
        }
       
        Auth::user()->logs()->create([
            'login_time' => now(),
            'action' => 'Lista Las Evaluaciones',
            'ip_address' => $request->ip(),
        ]);

        return view('admin.evaluacion.index',['datos'=>$datos]);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $evaluacion = new Evaluacion();
        $evaluacion->users_id = Auth::user()->id;
        $evaluacion->siniestro_id = $request->siniestro_id;
        $evaluacion->save();

        $siniestro = Siniestro::find($request->siniestro_id);
        $siniestro->activo = 'Evaluado';
        $siniestro->update();

        $campo = new Campo_evaluacion();
        $campo->nombre ='incidentes';
        $campo->evaluacion_id = $evaluacion->id;
        foreach ($request->incidentes as $value) {
            $campo->descripcion = $campo->descripcion." ".$value;
        }
        $campo->save();

        $campo = new Campo_evaluacion();
        $campo->nombre ='detalle';
        $campo->descripcion =$request->detalle;
        $campo->evaluacion_id =  $evaluacion->id;
        $campo->save();
    
        $campo = new Campo_evaluacion();
        $campo->nombre ='costo';
        $campo->descripcion =$request->costo ;
        $campo->evaluacion_id =  $evaluacion->id;
        $campo->save();
        
        return redirect('admin/adminsiniestro');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siniestro = Siniestro::find($id);
        $vehiculo = Vehiculo::find($siniestro->vehiculo_id);
    
        return view('admin.evaluacion.create', compact('siniestro','vehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evaluacion = Evaluacion::find($id);
            //$campo = Campo_evaluacion::find($id);
            $campos = DB::table('campo_evaluacions')
            ->where('evaluacion_id', '=', $id)
            ->groupBy('evaluacion_id', 'id', 'nombre', 'descripcion', 'created_at', 'updated_at')
            ->get();

          return view('admin.evaluacion.show',compact('evaluacion','campos'));
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
