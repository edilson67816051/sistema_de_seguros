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
        <form class="row g-4" action="/cliente/vehiculo" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-4">
                <label for="name">Modelo</label>
                <input type="text" required minlength="3" maxlength="50" class="form-control" name="modelo" placeholder="Modelo...">
            </div>        
            <div class="col-md-4">
                <label for="slug">Marca</label>
                <input type="text" required minlength="3" maxlength="50" class="form-control" name="marca" placeholder="Marca...">
            </div> 
            <div class="col-md-4">
                <label for="detalle">Placa</label>
                <input type="text"required  minlength="3" maxlength="100" class="form-control" name="placa" placeholder="Placa...">
            </div>
            
            <div class="col-md-3">
                <label for="Stock">Potencia km/h</label>
                <input type="text" required maxlength="3" class="form-control" name="potencia" placeholder="Potencia...">
            </div>
           
            <div class="col-md-3">
                <label for="precio">Altura</label>
                <input type="text" required maxlength="4" class="form-control" name="altura" placeholder="Altura...">
            </div>
            <div class="col-md-3">
                <label for="descripcion">Anchura</label>
                <input type="text" class="form-control" name="anchura" placeholder="Anchura...">
            </div>
            <div class="col-md-3">
                <label for="categoria">Nurmero Asiento</label>
                <input type="text" class="form-control" name="nro_asiento" placeholder="Nro Asientos ...">
            </div>
            <div class="col-md-3">
                <label for="Stock">Combustible</label>
                <input type="text" required maxlength="3" class="form-control" name="combustible" placeholder="Combustible ...">
            </div>
            <div class="col-md-5">
                <label for="categoria">Descripcion</label>
                <input type="text" class="form-control" name="descripcion" placeholder="Descripcion ...">
            </div>
            <div class="col-md-5">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" id="imagen"  accept="image/*" >
            </div>
            
            <div class="col-md-12">
                <br>
                <button type="submit" class="btn btn-primary">Registrar</button>
                <button type="reset" class="btn btn-danger">Cancelar</button>
            </div>   
        </form>
</div>

@endsection