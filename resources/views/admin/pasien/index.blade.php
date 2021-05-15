@extends('layouts.backend.master')
@section('title', 'Data Pasien')
@push('page-styles')
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    
@endpush
@section('content')

    <div class="section-body">
      <div>
        {{-- <a href="{{ route('admin.laykes.create') }}" class="btn btn-primary fas fa-plus"> Tambah Layanan Kesehatan</a> --}}
        <a href="#" class="btn btn-primary fas fa-file-pdf"> Export</a>
    </div>
    <br>
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered" id="data_rumahsakitKota">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Jenis Kelamin</th>
                        <th>Usia</th>
                        <th>Kotamadya</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                </thead>
                <tbody>
                  @foreach ($pasien as $no => $p)
                      <tr>
                        <td>{{ $no+1 }}</td>
                        <td>{{ $p->jenis_kelamin }}</td>
                        <td>{{ $p->usia }}</td>
                        <td>{{ $p->id_wilayah }}</td>
                        <td>{{ $p->id_kecamatan }}</td>
                        <td>{{ $p->id_kelurahan }}</td>
                        <td>{{ $p->status }}</td>
                        <td class="text-center">
                          <a href="" class="btn btn-sm btn-info fa fa-eye"></a>
                          <a href="" class="btn btn-sm btn-danger fas fa-file-pdf"></a>
                        </td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
        </div>
    </div>

@endsection

@push('after-scripts')
  <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script>
      $(document).ready( function () {
          $('#data_rumahsakitKota').DataTable();
      } );
  </script>  
@endpush