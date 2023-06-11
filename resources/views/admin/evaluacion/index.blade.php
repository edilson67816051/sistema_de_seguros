@extends('admin.app')
@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Evaluacion Realizadas <a href="{{url("admin/evaluacion/create")}}" >
            <button type="button" class="btn btn-success">Relizar una Nueva evaluacion</button></a> 
            
        </h5>
        
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Evaluador</th>
                        <th>Codigo Siniestor</th>
                        <th>Fecha</th>
                        <th>Monto</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Evaluador</th>
                        <th>Codigo Siniestor</th>
                        <th>Fecha</th>
                        <th>Monto</th>
                        <th>Opciones</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($evaluaciones as $item)                
                    <tr>
                        <td>{{$item->users_id}}</td>
                        <td>{{$item->siniestro_id}}</td>
                        <td>{{$item->fecha}}</td>
                        <td>{{$item->monto}}</td>
                        <td>
         
                            <form action="{{route('vehiculo.destroy',$item->id)}}" method="POST">
                                <a href="{{route('vehiculo.edit',$item->id)}}"><button type="button" class="btn btn-primary"><i class="fa fa-edit"></i></button></a>    
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