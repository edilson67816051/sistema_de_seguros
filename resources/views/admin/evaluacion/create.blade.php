@extends('admin.app')
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
                <label for="siniestros">Siniestros</label>
                    <select name="vehiculo" class="form-control">
                        
                        @foreach ($siniestros as $item)
                            <option value={{$item->id}} >{{$item->id}}</option>
                        @endforeach
                    </select>
            </div>       

            <div class="col-md-4">
                <label for="slug">descripcion</label>
                <input type="text" required minlength="3" maxlength="50" class="form-control" name="marca" placeholder="Marca...">
            </div> 
            
            <div class="col-md-12">
                <br>
                <button type="submit" class="btn btn-primary">Registrar</button>
                <button type="reset" class="btn btn-danger">Cancelar</button>
            </div>   
        </form>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Descripcion</th>
                            <th>costo</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Total</th>
                            <th>costo</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($detalles as $item)                
                        <tr>
                            <td>{{$item->detalle}}</td>
                            <td>{{$item->costo}}</td>
                            <td>         
                                <form action="{{route('vehiculo.destroy',$item->id)}}" method="POST">
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

</div>

@endsection