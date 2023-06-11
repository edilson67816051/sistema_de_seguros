@extends('cliente.app')
@section('content')

<div class="container">
    <h2>Nuevo Vehiculo</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
   @endif
        <form class="row g-3" action="{{route('vehiculo.update',$vehiculo->id)}}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="col-md-5">
                <label for="name">Modelo</label>
                <input type="text" required minlength="3" value="{{$vehiculo->modelo}}" class="form-control" name="modelo" placeholder="Modelo...">
            </div>        
            <div class="col-md-5">
                <label for="slug">Marca</label>
                <input type="text" required minlength="3" value="{{$vehiculo->marca}}" maxlength="50" class="form-control" name="marca" placeholder="Marca...">
            </div> 
            <div class="col-md-5">
                <label for="detalle">Placa</label>
                <input type="text"required  minlength="3" value="{{$vehiculo->placa}}" maxlength="100" class="form-control" name="placa" placeholder="Placa...">
            </div>
            <div class="col-md-5">
                <label for="Stock">Combustible</label>
                <input type="text" required maxlength="3" value="{{$vehiculo->combustible}}" class="form-control" name="combustible" placeholder="Combustible ...">
            </div>
            <div class="col-md-5">
                <label for="Stock">Potencia km/h</label>
                <input type="text" required maxlength="3" value="{{$vehiculo->potencia}}" class="form-control" name="potencia" placeholder="Potencia...">
            </div>
           
            <div class="col-md-5">
                <label for="precio">Altura</label>
                <input type="text" required maxlength="4" value="{{$vehiculo->altura}}" class="form-control" name="altura" placeholder="Altura...">
            </div>
            <div class="col-md-5">
                <label for="descripcion">Anchura</label>
                <input type="text" class="form-control" value="{{$vehiculo->anchura}}" name="anchura" placeholder="Anchura...">
            </div>
            <div class="col-md-5">
                <label for="categoria">Nurmero Asiento</label>
                <input type="text" class="form-control" value="{{$vehiculo->nro_asiento}}" name="nro_asiento" placeholder="Nro Asientos ...">
            </div>
            <div class="col-md-5">
                <label for="categoria">Descripcion</label>
                <input type="text" class="form-control" value="{{$vehiculo->descripcion}}" name="descripcion" placeholder="Descripcion ...">
            </div>
            <div class="col-md-5">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" id="imagen"  accept="image/*" >
            </div>
            
            <div class="col-md-12">
                <br>
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <button type="reset" class="btn btn-danger">Cancelar</button>
            </div>   
        </form>
</div>

@endsection