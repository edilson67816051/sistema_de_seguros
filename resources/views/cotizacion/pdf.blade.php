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
    .result-form {
      max-width: 500px;
      margin: 0 auto;
      padding: 20px;
    }
    .result-form h2 {
      margin-bottom: 20px;
    }
    .result-form p {
      margin-bottom: 10px;
    }
    .logo {
      max-width: 100px;
    }
    .company-details {
      margin-bottom: 20px;
    }
    .contact-info {
      margin-top: 20px;
    }
    .pdf-button {
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="result-form mt-5">
      <div class="company-details">
        <img src="{{ public_path('imagenes/logo.png') }}" alt="Logo" class="logo">
        <h2>Aseguradora Fortaleza</h2>
        <p>Santa Cruz</p>
      </div>
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
      <div class="contact-info">
        <p>Teléfono de Contacto: 67816051</p>
        <p>Email de Contacto: aseguradorafortaleza@empresa.com</p>
        <p>Dirección de Contacto: santa cruz</p>
      </div>

    </div>
  </div>

  <!-- Enlace a los scripts de Bootstrap 5 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>