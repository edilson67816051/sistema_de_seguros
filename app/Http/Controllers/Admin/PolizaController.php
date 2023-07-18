<?php

namespace App\Http\Controllers\Admin;

use App\Models\Imagen;
use App\Models\Poliza;
use App\Models\Siniestro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Cobertura;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\Auth;

use Dompdf\Dompdf;
use Dompdf\Options;

class PolizaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $polizas = DB::table('polizas')
        //->where('estado',"=",1)
        ->get();
        $user = Auth::user();

        Auth::user()->logs()->create([
            'login_time' => now(),
            'action' => 'Listo todas  las polizas',
            'ip_address' => $request->ip(),
        ]);
        

        return view('admin.poliza.index',['polizas'=>$polizas]);
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
    public function estado($id)
    {
        $polizas = Poliza::find($id);
        if($polizas->activo==0){
            $polizas->activo=1;
            $polizas->estado=1;
        }         
        else
            {
                $polizas->activo=0;
                $polizas->estado=0;
            }
        $polizas->update();
        return redirect(url('admin/poliza'));
    }

    public function exportToPdf($id)
    {
        // Obtener los datos de la cotización desde la base de datos
        $poliza = Poliza::find($id);
        $coberturas = Cobertura::join("poliza_coberturas","poliza_coberturas.cobertura_id","=","coberturas.id")
                    ->select('coberturas.id',"coberturas.nombre","coberturas.costo")
                    ->where('poliza_coberturas.poliza_id',"=",$poliza->id)
                    ->get();
        
        $vehiculo = DB::table('vehiculos')
            ->select('id','modelo','marca','placa','combustible') 
            ->where('id','=',$poliza->vehiculo_id)
            ->get();

        $usuario = DB::table('users')
        ->where('id','=',$poliza->users_id)
        ->first();

        // Crear una nueva instancia de Dompdf
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);


        // Generar el contenido HTML del PDF
        $html = view('admin.poliza.pdf', compact('poliza','coberturas','vehiculo','usuario'))->render();

        // Cargar el contenido HTML en Dompdf
        $dompdf->loadHtml($html);

        // Renderizar el PDF
        $dompdf->render();

        // Guardar el PDF en una ubicación específica
        $output = $dompdf->output();
        $filePath = public_path('pdfs/cotizacion_'.$id.'.pdf');
        file_put_contents($filePath, $output);

        // Redireccionar o hacer cualquier otra acción, como mostrar un mensaje de éxito
        return response()->download($filePath, 'cotizacion_' . $poliza->id . '.pdf');
       // return view('cotizacion.show',compact('cotizacion'))->with('success', 'El PDF de la cotización se ha generado correctamente.');
    }

}
