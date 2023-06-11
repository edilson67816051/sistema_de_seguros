
@extends('cliente.app')
@section('content')
<style>
    #map {
        height: 400px;
    }
        .form-group {
            margin-bottom: 20px;
        }
        .preview-image {
            max-width: 200px;
            max-height: 200px;
            margin-top: 10px;
        }
</style>

<div class="container">   
        <form class="row g-4"  action="/cliente/siniestro" method="POST" enctype="multipart/form-data">
            
            @csrf

            <div class="col-md-6">
                <label for="tipo_poliza">vehiculo</label>
                    <select name="vehiculo" class="form-control">
                       
                        @foreach ($vehiculos as $item)
                          <option value={{$item->id}} >{{$item->marca}} {{$item->placa}}</option>
                        @endforeach
                    </select>
            </div>       
            <div class="col-md-6">
                <label for="fecha">Fecha Inicio</label>
                <input name="fecha" type="date" class="form-control" value="<?php echo date('2023-05-28'); ?>" />

            </div> 

            <div class="col-md-6">
                <label for="exampleTextarea">Detalles</label>
                <textarea class="form-control" name="detalle" id="exampleTextarea" rows="3"></textarea>
            </div>

            <div class="col-md-6">
                <label for="imagenes">Seleccionar Imágenes</label>
                <input type="file" id="imagenes" name="imagenes[]" class="form-control-file" multiple required onchange="previewImage(event)">
            </div>
            
            <div class="col-md-12">
                <div id="preview"></div>
            </div>

            <input type="hidden" id="latitud" name="latitud">
            <input type="hidden" id="longitud" name="longitud">

            <div class="col-md-12">
                <h1>Capturar tu Ubicacion</h1>
                     <div id="map"></div>
            </div>
            
            <div class="col-md-6">
                <br>
                <button type="submit" class="btn btn-primary">Guardar Ubicación</button>
            </div>
        </form>
        
    </div>

    <script>
             function previewImage(event) {
            var preview = document.getElementById('preview');
            var files = event.target.files;

            for (var i = 0; i < files.length; i++) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    var img = document.createElement("img");
                    img.src = e.target.result;
                    img.classList.add("preview-image");
                    preview.appendChild(img);
                }

                reader.readAsDataURL(files[i]);
            }
             }

            function initMap() {
            var geocoder = new google.maps.Geocoder();
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 0, lng: 0},
                zoom: 8
            });

            geocoder.geocode({ address: 'Santa Cruz' }, function(results, status) {
                if (status === 'OK') {
                    map.setCenter(results[0].geometry.location);

                    var marker = new google.maps.Marker({
                        map: map,
                        draggable: true,
                        position: results[0].geometry.location
                    });

                    google.maps.event.addListener(marker, 'dragend', function(event) {
                        document.getElementById('latitud').value = event.latLng.lat();
                        document.getElementById('longitud').value = event.latLng.lng();
                    });
                } else {
                    console.log('Geocode was not successful for the following reason: ' + status);
                }
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHDp56fs4CX8y0khNRAR2cnIwEz8rWs7Y&callback=initMap"></script>

@endsection