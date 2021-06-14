@extends('layouts.backend.master')
@section('title', 'Ubah Data Pasien')
@push('page-styles')

    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

@endpush
@section('content')

    <div class="card">
      <form action="{{ route('admin.pasien.update', $pasien->id) }}" method="POST">
      @csrf
      @method('put')
      <div class="card-body">
        <div class="form-group">
            <label for="inputAddress2">NIK</label>
            <input type="number" class="form-control @error('id') is-invalid @enderror"
             name="id" value="{{ $pasien->id }}" maxlength="16" id="inputAddress2" placeholder="NIK" required>
              @error('id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>
        <div class="form-group">
          <label for="inputAddress2">Nama Pasien</label>
          <input type="text" class="form-control @error('nama_pasien') is-invalid @enderror"
           name="nama_pasien" value="{{ $pasien->nama_pasien }}" id="inputAddress2" placeholder="Nama Pasien" required>
            @error('nama_pasien')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputPassword4">Usia</label>
            <input type="number" value="{{ $pasien->usia }}" name="usia" maxlength="3" class="form-control @error('usia') is-invalid @enderror"
            id="usia" placeholder="Usia" required>
            @error('usia')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group col-md-4">
            <label for="inputEmail4">Jenis Kelamin</label>
            <select id="inputState" class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" required>
                <option value="L" @if ($pasien->jenis_kelamin == "L") selected @endif>Laki-laki</option>
                <option value="P" @if ($pasien->jenis_kelamin == "P") selected @endif>Perempuan</option>
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
                <option value="Positif" @if ($pasien->status == "Positif") selected @endif>Positif</option>
                <option value="Meninggal" @if ($pasien->status == "Meninggal") selected @endif>Meninggal</option>
                <option value="Sembuh" @if ($pasien->status == "Sembuh") selected @endif>Sembuh</option>
            </select>
            @error('status')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
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
        <div class="form-group">
          <label for="inputPassword4">Wilayah</label>
          <select id="inputState" class="form-control @error('id_wilayah') is-invalid @enderror" name="id_wilayah" required>
            @foreach ($wilayah as $data)
                <option value="{{ $data->id }}" {{$data->id == $pasien->id_wilayah ? 'selected' : ''}}>{{ $data->nama }}</option>
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
            @foreach ($kecamatan as $data)
                <option value="{{ $data->id }}" {{$data->id == $pasien->id_kecamatan ? 'selected' : ''}}>{{ $data->nama }}</option>
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
            @foreach ($kelurahan as $data)
                <option value="{{ $data->id }}" {{$data->id == $pasien->id_kelurahan ? 'selected' : ''}}>{{ $data->nama }}</option>
            @endforeach
          </select>
          @error('id_kelurahan')
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

@endpush

