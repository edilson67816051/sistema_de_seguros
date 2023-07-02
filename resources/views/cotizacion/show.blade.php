<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultado de Cotización</title>
  <!-- Enlace a los estilos de Bootstrap 5 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
  <style>
    /* Estilos adicionales personalizados */
    .result-card {
      max-width: 500px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #fff;
    }
    .result-card h2 {
      margin-bottom: 20px;
    }
    .result-card p {
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="result-card mt-5">
      <h2>Resultado de Cotización</h2>
      <p><strong>Nombre:</strong> {{$cotizacion->name}}</p>
      <p><strong>Email:</strong> {{$cotizacion->email}}</p>
      <p><strong>Teléfono:</strong>{{$cotizacion->telefono}}</p>
      <p><strong>Marca del vehículo:</strong> {{$cotizacion->marca}}</p>
      <p><strong>Modelo del vehículo:</strong>{{$cotizacion->modelo}}</p>
      <p><strong>Año del vehículo:</strong> {{$cotizacion->anio}}</p>
      <p><strong>Tipo de cobertura:</strong> {{$cotizacion->cobertura}}</p>
      <p><strong>Precio de la cotización:</strong> {{$cotizacion->costo}}</p>
      <p><strong>Fecha de la cotización:</strong>{{$cotizacion->created_at}} Bs/anual</p>

      <!-- Botones -->
      <div class="text-center mt-4">

        <a href="{{ route('cotizacion.pdf', $cotizacion->id) }}" class="btn btn-primary">Descargar PDF</a>
        <a href="{{ route('enviar.correo', $cotizacion->id) }}" class="btn btn-info">Enviar por Correo</a>
        <a href="{{url("/")}}" class="btn btn-secondary">Salir</a>
      </div>
    </div>
  </div>

  <!-- Enlace a los scripts de Bootstrap 5 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
