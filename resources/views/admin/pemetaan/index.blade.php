@extends('layouts.backend.master')
@section('title', 'Pemetaan Layanan Kesehatan')
@push('page-styles')
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    
    <!--Leaflet-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin="">
  </script>
@endpush
@section('content')

    <div class="section-body">
      {{-- <div>
        <a href="{{ route('admin.laykes.create') }}" class="btn btn-primary fas fa-plus"> Tambah Layanan Kesehatan</a>
    </div>
    <br> --}}
    <div class="card">
        <div class="card-body p-0">
            <div id="mapid" style="width: 1040px; height: 400px;"></div>
        </div>
    </div>
    
    <script>
        var mymap = L.map('mapid').setView([-6.205154154013863, 106.84186463929707], 11);
      
      L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        // maxZoom: 11,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
          'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        // tileSize: 512,
        // zoomOffset: -1
      }).addTo(mymap);
  
      @foreach ($laykes as $data)
      var icon = L.icon({
        iconUrl: '{{ asset('assets/img/loc.png') }}', //folder icon
        iconSize: [40, 40], //icon size
      });
  
      //menampilkan informasi di map
  
      var info = '<table><thead><tr><th colspan="2" class="text-center">{{$data->nama_rumahsakit}}</th></tr></thead><tbody><tr><td>Alamat</td><td>: {{$data->alamat}}</td></tr><tr><td>Kelurahan</td><td>: {{$data->kelurahan->nama}}</td></tr><tr><td>kecamatan</td><td>: {{$data->kecamatan->nama}}</td></tr><tr><td>Kota Madya</td><td>: {{ $data->wilayah->nama }}</td></tr><tr><td>No. Telpon</td><td>: {{$data->no_telpon}}</td></tr><tr><td colspan="2" class="text-center"><a href="{{route('admin.laykes.show', $data->id)}}" class="btn btn-sm btn-default">Detail</a></td></tr></tbody></table>';
  
      //menampilkan marker
      L.marker([{{$data->latitude}}, {{$data->longitude}}], {icon: icon})
      .addTo(mymap)
      //menampilkan popup
          .bindPopup(info);
  
      @endforeach
          </script>
  @endsection