@extends('admin.app')
@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Bitacora
            
        </h5>
        
    </div>
    <div class="card-body">
        <div class="col-xl-12">
            <form action="{{route('bitacora.index')}}" method="get">
                <div class="form-row">
                    <input type="text" class="form-control" name="texto" value="{{$texto}}">
                </div>
                <div class="col-auto my-1">
                    <input type="submit" class="btn btn-primary" value="Buscar">
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id </th>
                        <th>Codigo Usuario</th>
                        <th>Fecha Inico</th>
                        <th>Fecha Final</th>
                        <th>Tiempo en el sistema</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($bitacora)<=0)
                    <tr>
                        <td colspan="6"> No hay resultados</td>
                    </tr>            
                    @else
                    @foreach ($bitacora as $item)                
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->users_id}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->updated_at}}</td>
                        <td>
                            {{
                               \Carbon\Carbon::parse($item->created_at)->format('i')
                            }}
                        </td>
                        <td>
         
                            <form action="{{route('vehiculo.destroy',$item->id)}}" method="POST">
                                <a href="{{route('bitacora.show',$item->id)}}"><button type="button" class="btn btn-primary">Operaciones</button></a>    
                                @csrf
                                @method('DELETE')
                             </form>
                          </td>
                    </tr>

                    @endforeach
                    @endif    
                </tbody>
            </table>
        </div>
    </div>

@endsection