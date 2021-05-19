@extends('layouts.frontend.master')
@section('title', 'Data Tenaga Medis')
@push('page-styles')
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

@endpush
@section('content')

<div class="site-section stats">
    <div class="container">
    <div class="col-lg-7 text-center mx-auto">
        <h2 class="section-heading">@yield('title')</h2>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="data">
                    <thead>
                          <tr>
                            <th>No.</th>
                              <th>Jumlah Tenaga Medis</th>
                              <th>Nama Rumah Sakit</th>
                              <th>Created At</th>
                              <th>Updated At</th>
                          </tr>
                    </thead>
                    <tbody>
                @foreach ($tenagamedis as $no => $data)
                    <tr>
                    <td>{{ $no+1 }}</td>
                    <td>{{ $data->jumlah_tenaga_medis }}</td>
                    <td>{{ $data->laykes->nama_rumahsakit }}</td>
                    <td>{{ $data->created_at }}</td>
                    <td>{{ $data->updated_at }}</td>
                    </tr>
                @endforeach
                  </tbody>
              </table>
          </div>
      </div>
            
        </div>
    </div>
    </div>
  </div>
@endsection

@push('page-scripts')
    <script src ="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@endpush

@push('after-scripts')

<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#data').DataTable();
    } );
</script>
@endpush

