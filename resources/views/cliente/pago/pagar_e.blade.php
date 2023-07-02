@extends('cliente.app')
@section('content')
<div class="container">
    <style>
        .qr-image {
            max-width: 250px;
            height: auto;
        }
    </style>   
     
    <h3 class="text-center mt-5">Realizar el Pago Evaluacion</h3>
 
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <form class="text-center mt-4" action="{{route('metodopago',1)}}" method="GET" enctype="multipart/form-data">
        <div class="row col-md-12">
            <div class="col-md-4">
                <label for="tipo_poliza">Codigo Siniestro</label>
                <input type="text" id="name" name="poliza" value="{{$siniestro->id}}" class="form-control" readonly>
            </div> 
            <div class="col-md-4">
                <label for="tipo_poliza">Fecha Siniestro</label>
                <input type="text" id="name" name="poliza" value="{{$siniestro->fecha_siniestro}}" class="form-control" readonly>
            </div> 
            <div class="col-md-6">
                <label for="tipo_poliza">Monto</label>
                <input type="text" id="name" name="poliza" value="{{$monto}}" class="form-control" readonly>
            </div> 

            <div class="col-md-6">
                <label for="tipo_poliza">Tipo de Pago</label>
                    <select name="metodo_pago" class="form-control">
                          <option value="Targ" > Pago con Targeta Credito</option>
                          <option value="Traf" > Pago con Transferencia Bancaria</option>
                          <option value="Qr" > Qr</option>
                    </select>
            </div>    
        </div> 

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>

@endsection