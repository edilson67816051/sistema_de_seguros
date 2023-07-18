<!DOCTYPE html>
<html>
<head>
    <title>Poliza</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h2, h3 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        th, td {
            border: 1px solid #000;
            padding: 5px 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .logo {
            float: left;
            margin-right: 20px;
            width: 130px; /* Ajusta el tamaño del logo según tus necesidades */
            height: auto;
        }
        .header-info {
            text-align: right;
            margin-bottom: 10px;
        }
        .header-info p {
            margin: 0; /* Elimina el margen por defecto en los párrafos */
        }
    </style>
</head>
<body>
    <div class="header-info">
        <img class="logo" src="https://aseguradorafortaleza.com.bo/sites/all/themes/aurum/aurum_sub/logo.png" alt="Logo">

        <p>Teléfono: +591 67816051</p>
        <p>Correo: aseguradora@fortalez.com</p>
        <p>Dirección: 5to Anillo/ Av. 3 Paso Frente</p>
    </div>

    <h2>Poliza</h2>
    <p>Poliza: {{$poliza->nro_poliza}} </p>   
    <p>Fecha: Desde {{ \DateTime::createFromFormat('Y-m-d H:i:s', $poliza->fecha_inicio)->format('Y-m-d') }}
         hasta {{ \DateTime::createFromFormat('Y-m-d H:i:s', $poliza->fecha_final)->format('Y-m-d') }}</p>
    <p>Prima Total: {{$poliza->prima_total}} Bs.</p>     
    <p>Monto: {{$poliza->prima_total_mensual}} Bs/Mes.</p>   

    <table>
        <tr>
            <th>Datos Personales</th>
        </tr>
        <tr>
            <td style="text-align: left;">
                <p>Usuario: {{$usuario->name. $usuario->apellido_p. $usuario->apellido_m}} </p>
                <p>Correo: {{$usuario->email}} </p>
                <p>CI: {{$usuario->ci}} </p>
                <p>Celular: {{$usuario->celular}} </p>
            </td>
        </tr>
    </table>

    <h3>Datos del Automóvil</h3>
    <table>
        <tr>
            <th>Id</th>
            <th>Modelo</th>
            <th>Marca</th>
            <th>Placa</th>
            <th>Combustible</th>
        </tr>
        @foreach ($vehiculo as $item)
            <tr>
                <td>{{$item->id}} </td>
                <td>{{$item->modelo}}</td>
                <td>{{$item->marca}}</td>
                <td>{{$item->placa}}</td>
                <td>{{$item->combustible}}</td>
            </tr>
        @endforeach
    </table>

    <h3>Cobertura</h3>
    <table>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Costo</th>
        </tr>
        @foreach ($coberturas as $item)
            <tr>
                <td>{{$item->id}} </td>
                <td>{{$item->nombre}}</td>
                <td>{{$item->costo}} BS/anio</td>
            </tr>
        @endforeach
      
        <tr>
            <td colspan="2" style="text-align: right; font-weight: bold;">Total:</td>
            <td>{{$poliza->prima_neta}} BS/anio</td>
        </tr>
    </table>
</body>
</html>
