@extends('cliente.app')
@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Lista de las polisas          
        </h5>
        
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Codigo Poliza</th>
                        <th>Fecha_Contrato</th>
                        <th>Estado</th>
                        <th>Total</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Codigo Poliza</th>
                        <th>Fecha_Contrato</th>
                        <th>Estado</th>
                        <th>Total</th>
                        <th>Opciones</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($polizas as $item)                
                    <tr>
                        <td>{{$item->nro_poliza}}</td>
                        <td>{{$item->fecha_inicio}}</td>
                        <td>
                            @if ($item->activo==1)
                              Activo                   
                            @else
                                Inactivo  
                            @endif 
                        </td>
                        <td>{{$item->prima_total}} Bs</td>
                    
                        <td>                           
                              
                             <a href="{{route('pago.show',$item->id)}}"><button type="button" class="btn btn-primary">Histori_Pago</button></a>   
                             <a href="{{route('pagar',$item->id)}}"><button type="button" class="btn btn-success">Pagar</button></a>                            
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection