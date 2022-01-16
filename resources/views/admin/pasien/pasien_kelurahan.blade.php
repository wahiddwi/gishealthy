@extends('layouts.backend.master')
@section('title', 'Data Kasus Per Kelurahan')
@push('page-styles')
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

@endpush
@section('content')

    <div class="section-body">
      <div>
        {{-- <a href="{{ route('admin.laykes.create') }}" class="btn btn-primary fas fa-plus"> Tambah Layanan Kesehatan</a> --}}
        <a href="{{ route('petugas.pasien-download-kelurahan') }}" class="btn btn-primary fas fa-file-pdf"> Export</a>
    </div>
    <br>
        {{-- <div class="card">
          <div class="card-body"> --}}
            <div class="table-responsive">
              <table class="table table-striped table-bordered" id="data_rumahsakitKota">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kelurahan</th>
                        <th>Sembuh</th>
                        <th>Positif</th>
                        <th>Meninggal</th>
                        {{-- <th>Action</th> --}}
                      </tr>
                </thead>
                <tbody>
                  @foreach ($pasien_kelurahan as $data)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama_kelurahan }}</td>
                        <td>{{ $data->jumlah_sembuh }}</td>
                        <td>{{ $data->jumlah_positif }}</td>
                        <td>{{ $data->jumlah_meninggal }}</td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
        {{-- </div>
    </div> --}}

@endsection

@push('after-scripts')
  <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script>
      $(document).ready( function () {
          $('#data_rumahsakitKota').DataTable();
      } );
  </script>
@endpush
