@extends('layouts.frontend.master')
@section('title', 'Data Rumah Sakit Per Kelurahan')
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
        <div class="mb-3">
            <a href="{{ route('download-rs-kelurahan') }}" class="btn btn-primary fas far fa-file-pdf"> Export</a>
        </div>
        {{-- <div class="card">
            <div class="card-body"> --}}
                <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="data">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Kelurahan</th>
                        <th>Jumlah Rumah Sakit Rujukan</th>
                        {{-- <th>Action</th> --}}
                      </tr>
                </thead>
                <tbody>
                    @foreach ($rskelurahan as $result)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $result->nama }}</td>
                        <td>{{ $result->jumlah }}</td>
                        {{-- <td class="text-center">
                            <a href="" class="btn btn-sm btn-info fa fa-eye"></a>
                            <a href="" class="btn btn-sm btn-danger fas fa-file-pdf"></a>
                        </td> --}}
                    </tr>
                    @endforeach
                  </tbody>
              </table>
          </div>
      </div>

        {{-- </div>
    </div> --}}
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

