<?php

namespace App\Http\Controllers\Admin;

use App\Models\Imagen;
use App\Models\Bitacora;
use App\Models\Siniestro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SiniestroController extends Controller
{
    
    public function index(Request $request)
    {
        $siniestro = Siniestro::all();

        Auth::user()->logs()->create([
            'login_time' => now(),
            'action' => 'Listo Los Siniestro',
            'ip_address' => $request->ip(),
        ]);
        return view('admin.siniestro.index',['siniestro'=>$siniestro]);
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
    public function show(Request $request,$id)
    {
        $siniestro = Siniestro::find($id);
        $imagen = DB::table('imagens')
        ->where('siniestro_id','=',$siniestro->id)
        ->get(); 

        Auth::user()->logs()->create([
            'login_time' => now(),
            'action' => 'Detallo un siniestro con el codigo :'.$siniestro->id,
            'ip_address' => $request->ip(),
        ]);

        return view('admin.siniestro.show',['siniestro'=>$siniestro],['imagenes'=>$imagen]);
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
