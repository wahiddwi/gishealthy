@extends('layouts.backend.master')
@section('title', 'Edit Tenaga Medis')
@push('page-styles')
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endpush
@section('content')

    <div class="section-body">
        <form action="{{ route('admin.tenagamedis.update', $tenagamedis->id) }}" method="POST">
            @csrf
            @method('put')

        <div class="card">
            <div class="card-body">
            <div class="form-group">
                <label for="nama">Jumlah Tenaga Medis</label>
                <input type="text" name="jumlah_tenaga_medis" value="{{ $tenagamedis->jumlah_tenaga_medis }}"
                class="form-control @error('jumlah_tenaga_medis') is-invalid @enderror" required>
                @error('jumlah_tenaga_medis')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
                <label>Rumah Sakit</label>
                <select class="form-control @error('id_rumahsakit') is-invalid @enderror" name="id_rumahsakit" required>
                    @foreach ($laykes as $data)
                      <option value="{{$data->id}}" {{$data->id == $tenagamedis->id_rumahsakit ? 'selected' : ''}}>{{ $data->nama_rumahsakit }}</option>
                    @endforeach
                </select>
                @error('id_rumahsakit')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
            <div class="form-group">
                <label>Kelurahan</label>
                <select class="form-control @error('id_kelurahan') is-invalid @enderror" name="id_kelurahan" required>
                    @foreach ($kelurahan as $data)
                      <option value="{{$data->id}}" {{$data->id == $tenagamedis->id_kelurahan ? 'selected' : ''}}>{{ $data->nama }}</option>
                    @endforeach
                </select>
                @error('id_kelurahan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
              <div class="form-group">
                <label>Kecamatan</label>
                <select class="form-control @error('id_kecamatan') is-invalid @enderror" name="id_kecamatan" required>
                @foreach ($kecamatan as $data)
                    <option value="{{$data->id}}" {{$data->id == $tenagamedis->id_kecamatan ? 'selected' : ''}}>{{ $data->nama }}</option>
                @endforeach
                </select>
                @error('id_kecamatan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
              <div class="form-group">
                <label>Wilayah</label>
                <select class="form-control @error('id_wilayah') is-invalid @enderror" name="id_wilayah" required>
                @foreach ($wilayah as $data)
                    <option value="{{$data->id}}" {{$data->id == $tenagamedis->id_wilayah ? 'selected' : ''}}>{{ $data->nama }}</option>
                @endforeach
                </select>
                @error('id_wilayah')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
            <div class="card-footer text-right">
                <button class="btn btn-warning fas fa-edit" type="submit">Simpan</button>
                <button class="btn btn-danger fa fa-trash" type="reset">Reset</button>
            </div>
        </div>
        </div>
    </form>
    </div>
@endsection

</div>

@push('page-scripts')
    <script src ="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@endpush

@push('after-scripts')
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
@endpush

