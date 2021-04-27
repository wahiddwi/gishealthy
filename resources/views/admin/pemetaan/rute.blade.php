@extends('layouts.backend.master')
@section('title', 'Rute Rumah Sakit')
@push('page-styles')
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    
    <!--Leaflet CSS-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>
    <!--Routing Machine CSS-->
    <link rel="stylesheet" href="{{ asset('assets/js/leaflet-routing-machine/dist/leaflet-routing-machine.css') }}" />
    <!--Leaflet-->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
    <!--Routing Machine-->
    <script src="{{ asset('assets/js/leaflet-routing-machine/dist/leaflet-routing-machine.js') }}"></script>
    <script src="{{ asset('assets/js/leaflet-routing-machine/examples/Control.Geocoder.js') }}"></script>
@endpush
@section('content')

    <div class="section-body">
      {{-- <div>
        <a href="{{ route('admin.laykes.create') }}" class="btn btn-primary fas fa-plus"> Tambah Layanan Kesehatan</a>
    </div>
    <br> --}}
    <div class="card">
        <div class="card-body p-0">
            <div id="mapid" style="width: 1040px; height: 600px;"></div>
        </div>
    </div>
    
    <script>
        var mymap = L.map('mapid').setView([-6.1382687,106.7428817], 16);
      
      L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        // maxZoom: 11,
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(mymap);
      //marker posisi awal
      L.marker([-6.1382687,106.7428817]).addTo(mymap)
  
      @foreach ($laykes as $data)
      var icon = L.icon({
        iconUrl: '{{ asset('assets/img/loc.png') }}', //folder icon
        iconSize: [40, 40], //icon size
      });
  
      //menampilkan informasi di map
  
      var info = '<table><thead><tr><th colspan="2" class="text-center">{{$data->nama_rumahsakit}}</th></tr></thead><tbody><tr><td>Alamat</td><td>: {{$data->alamat}}</td></tr><tr><td>Kelurahan</td><td>: {{$data->kelurahan->nama}}</td></tr><tr><td>kecamatan</td><td>: {{$data->kecamatan->nama}}</td></tr><tr><td>Kota Madya</td><td>: {{ $data->wilayah->nama }}</td></tr><tr><td>No. Telpon</td><td>: {{$data->no_telpon}}</td></tr><tr><td colspan="2" class="text-center"><button onclick="return keSini({{$data->latitude}}, {{$data->longitude}})">Kesini</button></td></tr></tbody></table>';
  
      //menampilkan marker
      L.marker([{{$data->latitude}}, {{$data->longitude}}], {icon: icon})
      .addTo(mymap)
      //menampilkan popup
          .bindPopup(info);
  
      @endforeach

      //rute
      var control = L.Routing.control({
            waypoints: [
                L.latLng(-6.1382687,106.7428817),
                L.latLng(-6.142991663104527, 106.73480103221097)
            ],
            geocoder: L.Control.Geocoder.nominatim(),
	        routeWhileDragging: true,
	        reverseWaypoints: true,
	        showAlternatives: true,
	        altLineOptions: {
	        	styles: [
	        		{color: 'black', opacity: 0.15, weight: 9},
	        		{color: 'white', opacity: 0.8, weight: 6},
	        		{color: 'blue', opacity: 0.5, weight: 2}
	        	]
	        }
        })
        control.addTo(mymap);

    //function tombol button keSini()
    function keSini(lat, lng) {
        var latLng=L.latLng(lat, lng);
        control.spliceWaypoints(control.getWaypoints().length - 1, 1, latLng);
    }
          </script>
  @endsection