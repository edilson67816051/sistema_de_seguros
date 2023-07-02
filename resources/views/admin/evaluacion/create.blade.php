@extends('admin.app')
@section('content')

<div class="container">
    <h2>Evaluacion del siniestor</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
   @endif
        <form class="row g-4" action="/admin/evaluacion" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="col-md-4">
                <label for="slug">Codigo siniestro</label>
                <input type="text" value="{{$siniestro->id}}" required minlength="3" maxlength="50" class="form-control" name="siniestro_id" placeholder="Marca...">
            </div> 

            <div class="col-md-4">
                <label for="slug">Fecha Siniestro</label>
                <input type="text" value="{{$siniestro->fecha_siniestro}}" required minlength="3" maxlength="50" class="form-control" name="marca" placeholder="Marca...">
            </div> 
            <div class="col-md-4">
                <label for="slug">Placa Vehiculo</label>
                <input type="text" value="{{$vehiculo->placa}}" required minlength="3" maxlength="50" class="form-control" name="marca" placeholder="Marca...">
            </div> 


            <div class="col-md-12">
                <label for="incidentes">Incidentes</label><br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="checkbox-list">
                            <label>
                                <input type="checkbox" name="incidentes[]" value="Choque con heridos"> Choque con heridos
                            </label><br>
                            <label>
                                <input type="checkbox" name="incidentes[]" value="Conductor herido"> Conductor herido
                            </label><br>
                            <label>
                                <input type="checkbox" name="incidentes[]" value="Accidente con peatones"> Accidente con peatones
                            </label><br>
                            <label>
                                <input type="checkbox" name="incidentes[]" value="Falla en frenos"> Falla en frenos
                            </label><br>
                            <label>
                                <input type="checkbox" name="incidentes[]" value="Derrame de combustible"> Derrame de combustible
                            </label><br>
                            <label>
                                <input type="checkbox" name="incidentes[]" value="Falla en el sistema eléctrico"> Falla en el sistema eléctrico
                            </label><br>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="checkbox-list">
                            <label>
                                <input type="checkbox" name="incidentes[]" value="Falla en cardan"> Falla en cardan
                            </label><br>
                            <label>
                                <input type="checkbox" name="incidentes[]" value="Falla en sistema de suspensión"> Falla en sistema de suspensión
                            </label><br>
                            <label>
                                <input type="checkbox" name="incidentes[]" value="Falla en sistema de dirección"> Falla en sistema de dirección
                            </label><br>
                            <label>
                                <input type="checkbox" name="incidentes[]" value="Accidente con otros vehículos"> Accidente con otros vehículos
                            </label><br>
                            <label>
                                <input type="checkbox" name="incidentes[]" value="Pasajeros del otro vehículo lesionados"> Pasajeros del otro vehículo lesionados
                            </label><br>
                            <label>
                                <input type="checkbox" name="incidentes[]" value="Muertos"> Muertos
                            </label><br>
                        </div>
                    </div>
                </div>
            </div>
            

            <div class="col-md-4">
                <label for="slug">Que Ocurrio</label>
                <input type="text"   maxlength="50" class="form-control" name="detalle" >
            </div> 
            <div class="col-md-4">
                <label for="slug">Costo</label>
                <input type="text" maxlength="50" class="form-control" name="costo" >
            </div> 

            <div class="col-md-12">
                <br>
                <button type="submit" class="btn btn-primary">Crear detalle</button>
                <button type="reset" class="btn btn-danger">Cancelar</button>
            </div>  
        </form>
  

@endsection