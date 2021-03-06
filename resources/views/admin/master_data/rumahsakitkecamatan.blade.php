@extends('layouts.backend.master')
@section('title', 'Data Rumah Sakit Per Kecamatan')
@push('page-styles')
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

@endpush
@section('content')

    <div class="section-body">
      <div>
        {{-- <a href="{{ route('admin.laykes.create') }}" class="btn btn-primary fas fa-plus"> Tambah Layanan Kesehatan</a> --}}
        <a href="{{ route('petugas.download-rumahsakit-kecamatan') }}" class="btn btn-primary fas fa-file-pdf"> Export</a>
    </div>
    <br>
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered" id="data_rumahsakitKecamatan">
                <thead>
                      <tr>
                        <th>No.</th>
                        <th>Kecamatan</th>
                        <th>Jumlah Rumah Sakit Rujukan</th>
                        <th>Nama Rumah Sakit</th>
                      </tr>
                </thead>
                <tbody>
                    @foreach ($data as $result)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $result->nama }}</td>
                        <td>{{ $result->laykes->count() }}</td>
                        <td>
                            @foreach ($result->laykes as $item)
                                <li>{{$item->nama_rumahsakit}}</li>
                            @endforeach
                        </td>
                        {{-- <td class="text-center">
                          <a href="{{ route('petugas.') }}" class="btn btn-sm btn-info fa fa-eye"></a>
                          <a href="" class="btn btn-sm btn-danger fas fa-file-pdf"></a>
                        </td> --}}
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
          $('#data_rumahsakitKecamatan').DataTable();
      } );
  </script>
@endpush
