@extends('cliente.app')
@section('content')
<style>
    #map {
        height: 400px;
    }  
        
        .preview-image {
            max-width: 200px;
            max-height: 200px;
            margin-top: 10px;
        }
</style>

<div class="container">   
          <div class="row g-4" >
                  
            <div class="col-md-6">
                <label for="fecha">Codigo Siniestro</label>
                <input name="fecha" readonly type="text" class="form-control" value="{{$siniestro->id}}" />

            </div> 

            <div class="col-md-6">
                <label for="fecha">Fecha del siniestro</label>
                <input name="fecha" type="text" readonly class="form-control" value="{{$siniestro->fecha_siniestro}}" />

            </div> 

            <div class="col-md-6">
                <label for="exampleTextarea">Detalles</label>
                <textarea class="form-control" id="exampleTextarea" rows="3" readonly> {{$siniestro->detalle}} </textarea>
            </div>

            <div class="col-md-12">
                <label class="d-flex align-items-center justify-content-center"><h2>Imagenes</h2></label>
                
            </div>
            

            @foreach ($imagenes as $imagen)
                <div class="col-md-4 mb-4">
                    <img src="{{ asset($imagen->upload_path . $imagen->nombre) }}" alt="Imagen" class="preview-image">
                </div>
            @endforeach
            <div class="col-md-12">
                <label class="d-flex align-items-center justify-content-center"><h2>Ubicacion</h2></label>
                <div id="map"></div>
            </div>
    
            
        </div>
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
                zoom: 11
            });

            geocoder.geocode({ address: 'Santa Cruz' }, function(results, status) {
                if (status === 'OK') {
                    map.setCenter(results[0].geometry.location);

                    var marker = new google.maps.Marker({
                        map: map,
                        draggable: true,
                        position: {lat: {{$siniestro->latitud}}, lng: {{$siniestro->longitud}}}
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