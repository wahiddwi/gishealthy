@extends('layouts.backend.master')
@section('title', 'Tambah Data Pasien')
@push('page-styles')

    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

@endpush
@section('content')

    <div class="card">
      <form action="{{ route('admin.pasien.store') }}" method="POST">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="inputAddress2">Nama Pasien</label>
          <input type="text" class="form-control @error('nama_pasien') is-invalid @enderror"
           name="nama_pasien" id="inputAddress2" placeholder="Nama Pasien" required>
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
                <option selected="">--Pilih Jenis Kelamin--</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
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
                <option value="Sembuh">Sembuh</option>
                <option value="Meninggal">Meninggal</option>
                <option value="Positif">Positif</option>
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
          id="inputAddress" placeholder="Alamat Lengkap" required style="height: 100px"></textarea>
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

