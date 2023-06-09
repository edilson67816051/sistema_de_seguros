@extends('cliente.app')
@section('content')
<div class="container">
    <style>
        .qr-image {
            max-width: 250px;
            height: auto;
        }
    </style>
    <h1 class="text-center mt-5">Pago con QR</h1>

    <div class="text-center mt-4">
        <img src="/imagenes/qr.png" alt="Código QR" class="img-fluid qr-image">
    </div>

    <form class="col-md-20" method="POST" action="{{route('finalizarpagorqr',$pago->id)}}" enctype="multipart/form-data" >
        @csrf
        <h2 class="text-center mb-3">Enviar Comprobante</h2>
        <div class="text-center mb-3">
            <label for="name" class="form-label">Monto:</label>
            <input type="text" id="name" name="monto" value="{{$pago->monto}}" class="form-control" readonly>
        </div>
        <div class="text-center mb-3">
            <label for="name" class="form-label">Metodo de pago</label>
            <input type="text" id="name" name="metodo" value="Qr" class="form-control" readonly>
        </div>
        <div class="text-center mb-3">
            <label for="name" class="form-label">Nombre:</label>
            <input type="text" id="name" name="name" value="{{Auth::User()->name}}" class="form-control" readonly>         
        </div>
        
        <div class="text-center mb-3">
            <label for="email" class="form-label">Correo Electrónico:</label>
            <input type="email" id="email" name="email" value="{{Auth::User()->email}}" class="form-control" readonly>
        </div>
        <div class="text-center mb-3">
            <label for="imagen" class="form-label">Comprobante:</label>
            <input type="file" name="imagen" id="imagen"  accept="image/*"required>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>

@endsection