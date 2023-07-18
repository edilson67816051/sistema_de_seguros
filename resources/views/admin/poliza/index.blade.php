@extends('admin.app')
@section('content')



 <div class="container">
   
    <div class="row">
        @foreach ($polizas as $poliza)                
            <div class="col-lg-4 mb-4">
                <div class="card bg-secondary text-white shadow">
                    
                    <div class="card-body">
                        <p><strong>Numero_poliza :</strong> {{$poliza->nro_poliza}}</p>
                        <p><strong>Fecha Inicio :</strong> {{\Carbon\Carbon::parse($poliza->fecha_inicio)->format('d-m-Y')}}</p>
                        <p><strong>Fecha Inicio :</strong> {{\Carbon\Carbon::parse($poliza->fecha_final)->format('d-m-Y')}}</p>
                        
                            <p><strong>Monto Total: </strong>{{$poliza->prima_total}} Bs</p> 
                            <p><strong>Monto :</strong>{{$poliza->prima_total_anual}} Bs/Anual </p>                              
                        <p><strong>Monto :</strong>{{$poliza->prima_total_semestral}} Bs/Semestral </p>   
                        <p><strong>Monto :</strong>{{$poliza->prima_total_mensual}} Bs/mensual </p> 
                        @if ($poliza->activo==1)
                             <p><strong>Estado :</strong> Activo</p>   
                             <a href="{{route('polizaestado',$poliza->id)}}"><button type="button" class="btn btn-danger">Desactivar</button></a>                   
                        @else
                             <p><strong>Estado :</strong> Inactivo</p>  
                             <a href="{{route('polizaestado',$poliza->id)}}"><button type="button" class="btn btn-success">Activar</button></a>   
                        @endif 
                        <a href="{{ route('poliza.pdf', $poliza->id) }}" class="btn btn-primary"><i class="fa fa-file-pdf-o" style="font-size:25px"></i></a>                      
                    </div>
                    
                </div>
            </div>
            
        @endforeach
        
    </div>
 </div>

 
@endsection