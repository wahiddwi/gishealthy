@extends('layouts.backend.master')
@section('title', 'Tambah Layanan Kesehatan')
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

<div class="row">
  <div class="col-12 col-md-6 col-lg-6">
    <div class="card">
      <form action="{{ route('admin.laykes.store') }}" method="POST">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="inputAddress2">Nama Layanan Kesehatan</label>
          <input type="text" class="form-control @error('nama_rumahsakit') is-invalid @enderror"
           name="nama_rumahsakit" id="inputAddress2" placeholder="Nama Rumah Sakit" required>
            @error('nama_rumahsakit')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputPassword4">Latitude</label>
            <input type="text" name="latitude" class="form-control @error('latitude') is-invalid @enderror"
            id="latitude" placeholder="Latitude" required>
            @error('latitude')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">Longitude</label>
            <input type="text" name="longitude" class="form-control @error('longitude') is-invalid @enderror"
            id="longitude" placeholder="Longitude" required>
            @error('longitude')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
        <div class="form-group">
          <label for="inputAddress">Alamat</label>
          <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"
          id="inputAddress" placeholder="Alamat Lengkap" required>
          @error('alamat')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="inputPassword4">Wilayah</label>
          <select id="inputState" class="form-control @error('id_wilayah') is-invalid @enderror" name="id_wilayah" required>
            <option selected="">--Pilih Wilayah--</option>
            @foreach ($wilayah as $data)
            <option value="{{ $data->id }}">{{ $data->nama }}</option>
          @endforeach
          </select>
          @error('id_wilayah')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="inputPassword4">Kecamatan</label>
          <select id="inputState" class="form-control @error('id_kecamatan') is-invalid @enderror" name="id_kecamatan" required>
            <option selected="">--Pilih Kecamatan--</option>
            @foreach ($kecamatan as $item)
            <option value="{{ $item->id }}">{{ $item->nama }}</option>
          @endforeach
          </select>
          @error('id_kecamatan')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="inputPassword4">Kelurahan</label>
          <select id="inputState" class="form-control @error('id_kelurahan') is-invalid @enderror"
          name="id_kelurahan" required>
            <option selected="">--Pilih Kelurahan--</option>
            @foreach ($kelurahan as $data)
            <option value="{{ $data->id }}">{{ $data->nama }}</option>
          @endforeach
          </select>
          @error('id_kelurahan')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="inputAddress2">No. Telpon</label>
          <input type="text" name="no_telpon" class="form-control @error('no_telpon') is-invalid @enderror"
          id="inputAddress2" placeholder="No. Telpon" required>
          @error('no_telpon')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="inputAddress2">Jumlah Kamar</label>
          <input type="text" name="jumlah_kamar" class="form-control @error('jumlah_kamar') is-invalid @enderror"
          id="inputAddress2" placeholder="Jumlah Kamar" required>
          @error('jumlah_kamar')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      <div class="card-footer">
        <button class="btn btn-primary" type="submit">Simpan</button>
      </div>
    </div>
  </form>
  </div>
  <div class="col-12 col-md-6 col-lg-6">

    <div class="card">
      <div class="card-header">
        <h4>Lokiasi Layanan Kesehatan</h4>
      </div>
      <div class="card-body">
        <div id="mapid" style="height: 500px;"></div>
      </div>
    </div>

  </div>
</div>

<script>

  var map = L.map('mapid').setView([-6.205154154013863, 106.84186463929707], 11);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
  // maxZoom: 11,
  attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
  id: 'mapbox/streets-v11',
  // tileSize: 512,
  // zoomOffset: -1
}).addTo(map);

//mengambil titik kordinat
  var curLocation = [-6.205154154013863, 106.84186463929707];
  map.attributionControl.setPrefix(false);

  var marker = new L.marker(curLocation, {
    draggable : 'true',
  });
  map.addLayer(marker);

  //mengambil titik kordinat saat marker di drag
  marker.on('dragend', function(event) {
  var position = marker.getLatLng();
  marker.setLatLng(position,{
  	draggable : 'true'
  	}).bindPopup(position).update();
  	$("#latitude").val(position.lat).keyup();
  	$("#longitude").val(position.lng).keyup();
  });

  //ambil titik kordinat saat marker di klik
  var latitude = document.querySelector("[name=latitude]");
  var longitude = document.querySelector("[name=longitude]");

  map.on("click", function(event){
    var lat = event.latlng.lat;
    var lng = event.latlng.lng;

    if (!marker) {

      marker = L.marker(event.latlng).addTo(map);
    } else {
      marker.setLatLng(event.latlng);
    }

    latitude.value = lat;
    longitude.value = lng;

  });

</script>


@endsection

@push('page-scripts')
    <script src ="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@endpush

@push('after-scripts')
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
<script>

    $(".swal-confirm").click(function(e) {
        id = e.target.dataset.id;
        swal({
            title: "Yakin Ingin Menghapus Data?",
            text: "Data yang sudah terhapus tidak bisa dikembalikan!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                swal("Data berhasil dihapus!", {
                icon: "success",
              });
              $(`#deleteWilayah${id}`).submit();
            } else {
            //   swal("Your imaginary file is safe!");
            }
          });
    });

</script>
@endpush

