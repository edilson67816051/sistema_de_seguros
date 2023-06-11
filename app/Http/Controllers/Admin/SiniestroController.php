<?php

namespace App\Http\Controllers\Admin;

use App\Models\Imagen;
use App\Models\Siniestro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiniestroController extends Controller
{
    
    public function index()
    {
        $siniestro = Siniestro::all();
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
    public function show($id)
    {
        $siniestro = Siniestro::find($id);
        $imagen= Imagen::all();
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
