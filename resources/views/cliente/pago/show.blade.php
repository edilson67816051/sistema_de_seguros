@extends('cliente.app')
@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Detalle de Pago       
        </h5>
        
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Metodo</th>
                        <th>Tipo Pago</th>
                        <th>Monto </th>
                        <th>Fecha vencimiento</th>
                        <th>Fecha Pagado</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Metodo</th>
                        <th>Tipo Pago</th>
                        <th>Monto </th>
                        <th>Fecha vencimiento</th>
                        <th>Fecha Pagado</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($pago as $item)                
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->metodo}}</td>
                        <td>{{$item->tipo_pago}}</td>
                        <td>{{$item->monto}} Bs</td>
                        <td>{{$item->fecha_limite_pago}}</td>
                        <td>{{$item->fecha_pago}}</td>
                        <td>{{$item->estado}}</td>

                        <td>                           
                              
                             <a href="{{route('pago.show',$item->id)}}"><button type="button" class="btn btn-primary">Detalle</button></a>   

                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection