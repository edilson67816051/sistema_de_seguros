<?php

namespace App\Http\Controllers;

use App\Models\Cobertura;
use App\Models\Cotizacion;
use Illuminate\Http\Request;

use Dompdf\Dompdf;
use Dompdf\Options;

class CotizacionController extends Controller
{
    function index(){
        return view('cotizacion.index');
    }

    function store(Request $request){
        $cotizacion = new Cotizacion();

        $cotizacion->name = request('name');
        $cotizacion->email= request('email');
        $cotizacion->telefono = request('telefono');
        $cotizacion->marca = request('marca');
        $cotizacion->telefono = request('telefono');
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

        return view('cotizacion.show',compact('cotizacion'));
    }



    public function exportToPdf($id)
    {
        // Obtener los datos de la cotización desde la base de datos
        $cotizacion = Cotizacion::find($id);

        // Crear una nueva instancia de Dompdf
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);

        // Generar el contenido HTML del PDF
        $html = view('cotizacion.pdf', compact('cotizacion'))->render();

        // Cargar el contenido HTML en Dompdf
        $dompdf->loadHtml($html);

        // Renderizar el PDF
        $dompdf->render();

        // Guardar el PDF en una ubicación específica
        $output = $dompdf->output();
        $filePath = public_path('pdfs/cotizacion_'.$id.'.pdf');
        file_put_contents($filePath, $output);

        // Redireccionar o hacer cualquier otra acción, como mostrar un mensaje de éxito
        return response()->download($filePath, 'cotizacion_' . $cotizacion->id . '.pdf');
       // return view('cotizacion.show',compact('cotizacion'))->with('success', 'El PDF de la cotización se ha generado correctamente.');
    }

}
