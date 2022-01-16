@extends('layouts.backend.master')
@section('title', 'Edit Data Pasien')
@push('page-styles')

    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

@endpush
@section('content')

    <div class="card">
      <form action="{{ route('petugas.pasien.update', $pasien->id) }}" method="POST">
      @csrf
      @method('put')
      <div class="card-body">
        <div class="form-group">
          <label for="inputAddress2">NIK</label>
          <input type="number" class="form-control @error('nik') is-invalid @enderror"
           name="nik" maxlength="16" id="inputAddress2" value="{{ $pasien->nik }}" placeholder="NIK" required>
            @error('nik')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="inputAddress2">Nama Pasien</label>
            <input type="text" class="form-control @error('nama_pasien') is-invalid @enderror"
             name="nama_pasien" id="inputAddress2" value="{{ $pasien->nama_pasien }}" placeholder="Nama Pasien" required>
              @error('nama_pasien')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="usia">Usia</label>
            <input type="number" maxlength="3" name="usia" class="form-control @error('usia') is-invalid @enderror"
            id="usia" value="{{ $pasien->usia }}" placeholder="Usia" required>
            @error('usia')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group col-md-4">
            <label for="inputEmail4">Jenis Kelamin</label>
            <select id="inputState" class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" required>
                <option selected="">--Pilih Jenis Kelamin--</option>
                <option value="Laki-laki" @if ($pasien->jenis_kelamin == "Laki-laki") selected @endif>Laki-laki</option>
                <option value="Perempuan" @if ($pasien->jenis_kelamin == "Perempuan") selected @endif>Perempuan</option>
              </select>
            @error('jenis_kelamin')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group col-md-4">
            <label for="inputEmail4">Status</label>
            <select id="inputState" class="form-control @error('status') is-invalid @enderror" name="status" required>
                <option selected="">--Pilih Status Pasien--</option>
                <option value="Sembuh" @if ($pasien->status == "Sembuh") selected @endif>Sembuh</option>
                <option value="Positif" @if ($pasien->status == "Positif") selected @endif>Positif</option>
                <option value="Meninggal" @if ($pasien->status == "Meninggal") selected @endif>Meninggal</option>
              </select>
            @error('status')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
        <div class="form-group">
            <label for="inputAddress2">No. Telpon</label>
            <input type="number" class="form-control @error('no_telpon') is-invalid @enderror"
             name="no_telpon" id="inputAddress2" value="{{ $pasien->no_telpon }}" placeholder="No. Telpon" required>
              @error('no_telpon')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>
        {{-- <div class="form-row"> --}}
            <div class="form-group">
              <label for="usia">Rumah Sakit Asal</label>
              <select id="rumahSakit" class="form-control @error('id_rumahsakit ') is-invalid @enderror" name="id_rumahsakit" required>
                <option>--Pilih Rumah Sakit--</option>
                @foreach ($laykes as $item)
                <option value="{{$item->id}}" {{$item->id == $pasien->id_rumahsakit ? 'selected' : ''}}>{{ $item->nama_rumahsakit }}</option>
              @endforeach
              </select>
              @error('id_rumahsakit')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
        {{-- </div> --}}
            {{-- <div class="form-group col-md-4">
              <label for="noKamar">No Kamar</label>
            <select id="noKamar" class="form-control @error('id_kamar') is-invalid @enderror" name="id_kamar" required>
                @foreach ($kamar as $item)
                    <option value="{{$item->id}}" {{$item->id == $pasien->id_kamar ? 'selected' : ''}}>{{ $item->no_kamar }}</option>
                @endforeach
            </select>

            </div>
          </div> --}}
        <div class="form-group">
          <label for="inputAddress">Alamat Lengkap</label>
          <textarea type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"
          id="inputAddress" placeholder="Alamat Lengkap" required style="height: 100px">{{ $pasien->alamat }}</textarea>
          @error('alamat')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        {{-- <div class="form-row">
        <div class="form-group col-md-4">
          <label for="wilayah">Wilayah</label>
          <select id="wilayah" class="form-control @error('id_wilayah') is-invalid @enderror" name="id_wilayah" required>
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
        <div class="form-group col-md-4">
          <label for="kecamatan">Kecamatan</label>
          <select id="kecamatan" class="form-control @error('id_kecamatan') is-invalid @enderror" name="id_kecamatan" required>
          </select>
        </div>
        <div class="form-group col-md-4">
          <label for="kelurahan">Kelurahan</label>
          <select id="kelurahan" class="form-control @error('id_kelurahan') is-invalid @enderror"
          name="id_kelurahan" required>

          </select>

        </div> --}}
        <div class="form-group">
            <label for="inputAddress2">Tanggal Keluar</label>
            <input type="date" class="form-control @error('tanggal_keluar') is-invalid @enderror"
             name="tanggal_keluar" id="inputAddress2" placeholder="Tanggal Keluar" required>
              @error('tanggal_keluar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>
      </div>
      <div class="card-footer">
        <button class="btn btn-primary" type="submit">Simpan</button>
      </div>
    </form>
    </div>


@endsection

@push('page-scripts')
    <script src ="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@endpush

@push('after-scripts')
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}

{{-- dropdown kamar --}}
    {{-- <script>
        $(document).ready(function () {
            $('#rumahSakit').on('change', function () {
                let id = $(this).val();
                $('#noKamar').empty();
                $('#noKamar').append(`<option value="0" disabled selected>Processing....</option>`);
                $.ajax({
                    type: 'GET',
                    url: '/petugas/getKamar/' + id,
                    success: function (response) {
                        var response = JSON.parse(response);
                        console.log(response);
                        $('#noKamar').empty();
                        $('#noKamar').append(`<option value="0" disabled selected>Pilih No Kamar</option>`);
                        response.forEach(element => {
                            $("#noKamar").append(`<option value="${element['id']}">${element['no_kamar']}</option>`);
                        });
                    }
                });
            });
        });
    </script>

{{-- dropdown kecamatan --}}
    <script>
        $(document).ready(function () {
            $('#wilayah').on('change', function () {
                let id = $(this).val();
                $('#kecamatan').empty();
                $('#kecamatan').append(`<option value="0" disabled selected>Mohon Tunggu....</option>`);
                $.ajax({
                    type: 'GET',
                    url: '/petugas/getKecamatan/' + id,
                    success: function (response) {
                        var response = JSON.parse(response);
                        console.log(response);
                        $('#kecamatan').empty();
                        $('#kecamatan').append(`<option value="0" disabled selected>Pilih Kecamatan</option>`);
                        response.forEach(element => {
                            $("#kecamatan").append(`<option value="${element['id']}">${element['nama']}</option>`);
                        });
                    }
                });
            });
        });
    </script>

{{-- dropdown kelurahan --}}
<script>
    $(document).ready(function () {
        $('#kecamatan').on('change', function () {
            let id = $(this).val();
            $('#kelurahan').empty();
            $('#kelurahan').append(`<option value="0" disabled selected>Mohon Tunggu....</option>`);
            $.ajax({
                type: 'GET',
                url: '/petugas/getKelurahan/' + id,
                success: function (response) {
                    var response = JSON.parse(response);
                    console.log(response);
                    $('#kelurahan').empty();
                    $('#kelurahan').append(`<option value="0" disabled selected>Pilih Kelurahan</option>`);
                    response.forEach(element => {
                        $("#kelurahan").append(`<option value="${element['id']}">${element['nama']}</option>`);
                    });
                }
            });
        });
    });
</script> --}}
@endpush

