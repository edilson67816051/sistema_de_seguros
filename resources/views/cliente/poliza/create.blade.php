@extends('cliente.app')
@section('content')

<div class="container">
    <h2>Nueva Poliza</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
   @endif
        <form class="row g-4" action="/cliente/vehiculo" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row col-md-6">
                <div class="col-md-12">
                    <label for="tipo_poliza">vehiculo</label>
                        <select name="vehiculo" class="form-control">
                            <option selected disabled> Elige una  ...</option>
                            @foreach ($vehiculos as $item)
                              <option value={{$item->id}} >{{$item->marca}} {{$item->placa}}</option>
                            @endforeach
                        </select>
                </div> 
                <div class="col-md-6">
                    <label for="tipo_poliza">Moneda</label>
                        <select name="moneda" class="form-control">
                              <option value="USD" > USD</option>
                              <option value="BOB" > BOB</option>
                        </select>
                </div> 
                <div class="col-md-6">
                    <label for="tipo_poliza">Tipo Pago</label>
                        <select name="moneda" class="form-control">
                              <option value="visa" > Visa</option>
                              <option value="qr" > QR</option>
                              <option value="deposito" >Deposito</option>
                        </select>
                </div> 
                <div class="col-md-6">
                    <label for="fecha_inicio">Fecha Inicio</label>
                    <input type="date" class="form-control" value="2023-05-01" />

                </div> 
                <div class="col-md-6">
                    <label for="fecha_Final">Fecha Final</label>
                    <input type="date" class="form-control" value="2023-05-01" />

                </div> 
               
                
            </div> 
            <div class="col-md-6">
               
                @foreach ($coberturas as $item)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        {{$item->nombre}}
                    </label>
                    <p>{{$item->descripcion}}. Costo : {{$item->costo}}</p>
                  </div>
                @endforeach
                 
            </div>   


            
            <div class="col-md-12">
                <br>
                <button type="submit" class="btn btn-primary">Registrar</button>
                <button type="reset" class="btn btn-danger">Cancelar</button>
            </div>   
        </form>
</div>
@endsection