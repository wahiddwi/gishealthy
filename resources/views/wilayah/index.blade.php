@extends('layouts.frontend.master')
@section('title', 'Wilayah')
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
            <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="data_wilayah">
                    <thead>
                          <tr>
                              <th>No.</th>
                              <th>Nama</th>
                              <th>Created At</th>
                              <th>Updated At</th>
                              
                          </tr>
                    </thead>
                    <tbody>
                      @foreach ($wilayah as $no => $w)
                    <tr>
                    <td>{{ $no+1 }}</td>
                    <td>{{ $w->nama }}</td>
                    <td>{{ $w->created_at }}</td>
                    <td>{{ $w->updated_at }}</td>
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
        $('#data_wilayah').DataTable();
    } );
</script>
@endpush

