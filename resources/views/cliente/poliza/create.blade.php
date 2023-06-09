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
        <form class="row g-4" action="/cliente/poliza" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row col-md-6">
                <div class="col-md-12">
                    <label for="tipo_poliza">vehiculo</label>
                        <select name="vehiculo" class="form-control">
                           
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
                        <select name="tipo_pago" class="form-control">
                              <option value="a" >Anual</option>
                              <option value="s" >Semestral</option>
                              <option value="m" >Mensual</option>
                        </select>
                </div> 
                <div class="col-md-6">
                    <label for="fecha_inicio">Fecha Inicio</label>
                    <input name="fecha_inicio" type="date" class="form-control" value="{{$fecha_actual}}" />

                </div> 
                <div class="col-md-6">
                    <label for="tipo_poliza">Duracion del Contrato</label>
                        <select name="anio" class="form-control">
                              <option value="1" > 1 Año</option>
                              <option value="2" > 2 año</option>
                              <option value="3" > 3 Año</option>
                              <option value="4" > 4 año</option>
                              <option value="5" > 5 Año</option>
                              <option value="6" > 6 año</option>
                              <option value="7" > 7 Año</option>
                              <option value="8" > 8 año</option>
                              <option value="9" > 9 Año</option>
                              <option value="10" > 10 año</option>
                        </select>

                </div> 
               
                
            </div> 
            <div class="col-md-6">
                <p class="h4">Coberturas</p>
                @foreach ($coberturas as $item)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="{{$item->id}}" value="{{$item->descripcion}}. Costo : {{$item->costo}}" id="flexCheckDefault">
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