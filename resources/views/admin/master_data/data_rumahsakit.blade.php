@extends('layouts.backend.master')
@section('title', 'Data Rumah Sakit')
@push('page-styles')
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

@endpush
@section('content')

    <div class="section-body">
      <div>
        {{-- <a href="{{ route('admin.laykes.create') }}" class="btn btn-primary fas fa-plus"> Tambah Layanan Kesehatan</a> --}}
        <a href="{{ route('admin.download-rumahsakit') }}" class="btn btn-primary fas fa-file-pdf"> Export</a>
    </div>
    <br>
        {{-- <div class="card">
          <div class="card-body"> --}}
            <div class="table-responsive">
              <table class="table table-striped table-bordered" id="data_rumahsakit">
                <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama Layanan</th>
                        <th>Longitude</th>
                        <th>Latitude</th>
                        <th>Alamat</th>
                        <th>No. Telpon</th>
                        <th>Kelurahan</th>
                        <th>Kecamatan</th>
                        <th>Kota Madya</th>
                        <th>User</th>
                        {{-- <th>Action</th> --}}
                      </tr>
                </thead>
                <tbody>
                  @foreach ($laykes as $no => $l)
                      <tr>
                        <td>{{ $no+1 }}</td>
                        <td>{{ $l->nama_rumahsakit }}</td>
                        <td>{{ $l->longitude }}</td>
                        <td>{{ $l->latitude }}</td>
                        <td>{{ $l->alamat }}</td>
                        <td>{{ $l->no_telpon }}</td>
                        <td>{{ $l->kelurahan->nama }}</td>
                        <td>{{ $l->kecamatan->nama }}</td>
                        <td>{{ $l->wilayah->nama }}</td>
                        <td>{{ $l->user->name }}</td>
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
          $('#data_rumahsakit').DataTable();
      } );
  </script>
@endpush
