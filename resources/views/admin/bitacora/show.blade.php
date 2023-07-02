@extends('admin.app')
@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Operaicones realizada 
            
        </h5>
        
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Operacion</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bitacora as $item)                
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->operacion}}</td>
                        <td>{{$item->created_at}}</td>
                
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection