@extends('cliente.app')
@section('content')

 <!-- Color System -->
 <div class="card-header py-3">
    <h5 class="m-0 font-weight-bold text-primary">Polizas <a href="{{url("cliente/poliza/create")}}" >
        <button type="button" class="btn btn-success">Registra tu poliza</button></a>         
    </h5>
 </div>

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
                        @else
                             <p><strong>Estado :</strong> Inactivo</p>  
                        @endif 
                        <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#tipoPago"><i class="fa fa-edit"></i></button >
                        <a href="{{route('pagar',$poliza->id)}}"><button type="button" class="btn btn-success">Activar</button></a>                          
                    </div>
                    
                </div>
            </div>
            
        @endforeach
        
    </div>
 </div>

 
@endsection