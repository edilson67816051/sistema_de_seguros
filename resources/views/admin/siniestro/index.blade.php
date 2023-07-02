@extends('admin.app')
@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Siniestro
            
        </h5>
        
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id vehiculo</th>
                        <th>Fecha</th>
                        <th>Detalle</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>id vehiculo</th>
                        <th>Fecha</th>
                        <th>Detalle</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($siniestro as $item)                
                    <tr>
                        <td>{{$item->vehiculo_id}}</td>
                        <td>{{$item->fecha_siniestro}}</td>
                        <td>{{$item->detalle}}</td>
                        <td>{{$item->activo}}</td>
                        <td>
                                

                            <form action="{{route('adminsiniestro.destroy',$item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{route('adminsiniestro.show',$item->id)}}"><button type="button" class="btn btn-primary">
                                    <i class="fa fa-info-circle"></i>
                                </button></a>
                                <a href="{{route('evaluacion.show',$item->id)}}"><button type="button" class="btn btn-success">
                                    <i class="fa fa-sticky-note"></i>
                                </button></a>
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