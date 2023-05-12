@extends('cliente.app')
@section('content')

 <!-- Color System -->
 <div class="card-header py-3">
    <h5 class="m-0 font-weight-bold text-primary">Polizas <a href="{{url("cliente/poliza/create")}}" >
        <button type="button" class="btn btn-success">Compra tu poliza</button></a>         
    </h5>
    
</div>
 <div class="container">
   
    <div class="row">
        @foreach ($polizas as $poliza)                
            <div class="col-lg-4 mb-4">
                <div class="card bg-secondary text-white shadow">
                    <div class="card-body">
                        Poliza : {{$poliza->id}}
                    </div>
                    <div class="card-body">
                        Fecha Inicio :  {{$poliza->fecha_inicio}}
                    </div>
                    <div class="card-body">
                        Fecha Final :  {{$poliza->fecha_final}}
                    </div>
                </div>
            </div>
        @endforeach
        
    </div>
 </div>

@endsection