@extends('admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detalles de Evaluación</div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>ID:</strong> {{$evaluacion->id}}</li>
                        <li class="list-group-item"><strong>Siniestro ID:</strong> {{$evaluacion->siniestro_id}} </li>
                        @foreach ($campos as $item)
                        <li class="list-group-item"><strong>{{$item->nombre}}:</strong> {{$item->descripcion}}</li>
                        @endforeach
                    
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

