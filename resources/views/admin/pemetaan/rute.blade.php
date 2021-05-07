@extends('layouts.backend.master')
@section('title', 'Rute Rumah Sakit')
@push('page-styles')
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    
    <!--Leaflet CSS-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>

  <!--Routing Machine CSS-->
  <link rel="stylesheet" href="{{ asset('assets/leaflet-routing-machine/dist/leaflet-routing-machine.css') }}">

  <!--Leaflet Js-->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin="">
  </script>

  <!--Routing Machine JS-->
  <script src="{{ asset('assets/leaflet-routing-machine/dist/leaflet-routing-machine.js') }}"></script>
  <script src="{{ asset('assets/leaflet-routing-machine/examples/Control.Geocoder.js') }}"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@endpush
@section('content')

<div class="section-body">
  <div class="card">
    <div class="card-body p-0">
      <div class="row" style="padding-block: 5px; margin: 0">
        <div class="col-md-4">
          <input type="text" name="latNow" class="form-control" readonly>
        </div>
        <div class="col-md-4">
          <input type="text" name="lngNow" class="form-control" readonly>
        </div>
        <div class="col-md-4" style="padding:5px">
          <button type="submit" class="btn btn-primary btn-sm dariSini"><i class="fas fa-map-marker-alt"></i> Mulai Dari Posisi Anda</button>
        </div>
      </div>
      <div id="mapid" style="height: 95vh; margin:0"></div>
    </div>
  </div>

<script>

let latLng=[-6.209178670646127, 106.73857221021726];
let map = L.map('mapid').setView(latLng, 15);
let layer = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            	attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
            });
            map.addLayer(layer);

          //marker posisi awal
  // L.marker(latLng).addTo(map);  

let icon = L.icon({
  iconUrl: '{{ asset('assets/img/hospital.png') }}', //folder icon
  iconSize: [25, 25], //icon size
});

//ambil titik awal
getLocation();
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  $("[name=latNow]").val(position.coords.latitude);
  $("[name=lngNow]").val(position.coords.longitude);
}

  @foreach ($laykes as $data)
  let latLngAwal = L.latLng(-6.209178670646127, 106.73857221021726);\
    // menampilkan informasi di map
    var info = '<table><thead><tr><th colspan="2" class="text-center">{{$data->nama_rumahsakit}}</th></tr></thead><tbody><tr><td>Alamat</td><td>: {{$data->alamat}}</td></tr><tr><td>Kelurahan</td><td>: {{$data->kelurahan->nama}}</td></tr><tr><td>kecamatan</td><td>: {{$data->kecamatan->nama}}</td></tr><tr><td>Kota Madya</td><td>: {{ $data->wilayah->nama }}</td></tr><tr><td>No. Telpon</td><td>: {{$data->no_telpon}}</td></tr><tr><td colspan="2" class="text-center"><button class="btn btn-sm btn-success" onclick="return keSini({{$data->latitude}}, {{$data->longitude}})">Ke Sini</button></td></tr></tbody></table>';
    // // menampilkan marker
    L.marker([<?=$data->latitude?>, <?=$data->longitude?>], {icon: icon})
    .addTo(map)
    // menampilkan popup
    .bindPopup(info);  
  @endforeach

//rute
let control =L.Routing.control({
    waypoints: [
      latLng //posisi awal
    ],

    geocoder: L.Control.Geocoder.nominatim(),
    routeWhileDragging: true,
    reverseWaypoints: true,
    showAlternatives: true,
    altLineOptions: {
    	styles: [
    		{color: 'black', opacity: 0.15, weight: 9},
    		{color: 'white', opacity: 0.8, weight: 6},
    		{color: 'blue', opacity: 0.5, weight: 2},
    	]
    },
    createMarker: function (i, waypoint, n) {
      let iconMyMarker;
      console.log(i+","+n)
      //jika i==0 maka muncul posisi awal
      if (i==0) {
        iconMyMarker='{{ asset('assets/img/loc_user.png') }}'; //folder icon
        //jika (i+1)==n merupakan posisi terakhir yaitu posisi tujuan
      }
      else if ((i+1)==n) {
        iconMyMarker='{{ asset('assets/img/loc_end.png') }}'; //folder icon
      }
      else {
        iconMyMarker='{{ asset('assets/img/step.png') }}'; //folder icon

      }
            const marker = L.marker(waypoint.latLng, {
              draggable: true,
              bounceOnAdd: false,
              bounceOnAddOptions: {
                duration: 1000,
                height: 800,
                function() {
                  (bindPopup(myPopup).openOn(map))
                }
              },
              //custom marker
              icon: L.icon({
                iconUrl: iconMyMarker, //folder icon
                iconSize: [40, 40], //icon size
              })
            });
            return marker;
          }
});
control.addTo(map);

  //function button keSini()
  function keSini(latitude, longitude){
    //inisialisasi variabel latLng
    let latLng = L.latLng(latitude,longitude);
    control.spliceWaypoints(control.getWaypoints().length - 1, 1, latLng);
  }

  //function button dariSini() menggunakan jquery 
  $(document).on("click",".dariSini",function () {
    let latLng = [$("[name=latNow]").val(),$("[name=lngNow]").val()];
    control.spliceWaypoints(0, 1, latLng);
    map.panTo(latLng);
  })


</script>
  
@endsection
