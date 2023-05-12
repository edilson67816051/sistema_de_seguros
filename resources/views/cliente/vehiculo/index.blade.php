@extends('cliente.app')
@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Vehiculos registrados <a href="{{url("cliente/vehiculo/create")}}" >
            <button type="button" class="btn btn-success">Registrar Vehiculo</button></a> 
            
        </h5>
        
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>PLACA</th>
                        <th>MARCA</th>
                        <th>MODELO</th>
                        <th>POTENCIA</th>
                        <th>IMAGEN</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>PLACA</th>
                        <th>MARCA</th>
                        <th>MODELO</th>
                        <th>POTENCIA</th>
                        <th>IMAGEN</th>
                        <th>Opciones</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($vehiculos as $vehiculo)                
                    <tr>
                        <td>{{$vehiculo->placa}}</td>
                        <td>{{$vehiculo->marca}}</td>
                        <td>{{$vehiculo->modelo}}</td>
                        <td>{{$vehiculo->potencia}} Km/h</td>
                        <td><img src="/imagenes/vehiculos/{{ $vehiculo->imagen}}"
                            class="card-img-top mx-auto"
                            style="height: 50px; width: 50px;display: block;"
                            alt="{{ $vehiculo->imagen }}"
                       ></td>
                        <td>
         
                            <form action="{{route('vehiculo.destroy',$vehiculo->id)}}" method="POST">
                                <a href="{{route('vehiculo.edit',$vehiculo->id)}}"><button type="button" class="btn btn-primary"><i class="fa fa-edit"></i></button></a>    
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                             </form>
                          </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection