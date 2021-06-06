@extends('layouts.frontend.master')
@section('title', 'Detail Layanan Kesehatan')
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
          <div class="mb-2">
            <a href="{{ route('pemetaan') }}" class="btn btn-danger ">Kembali <i class="fas fa-share"></i></a>
            <a href="{{ route('download.laykesDetail', $laykes->id) }}" class="btn btn-primary fas far fa-file-pdf"> Export</a>
          </div>
      {{-- </div> --}}
          <div class="card">
                  <div class="table-responsive">
                      <table class="table table-striped table-bordered table-md">
                          {{-- <thead> --}}
                              {{-- </thead> --}}
                            <tbody>
                              <tr>
                                <th>Nama Rumah Sakit</th>
                                <th>{{ $laykes->nama_rumahsakit }}</th>
                              </tr>
                            <tr>
                              <td>Alamat</td>
                              <td>{{$laykes->alamat}}</td>
                            </tr>
                            <tr>
                              <td>Kelurahan</td>
                              <td>{{$laykes->kelurahan->nama}}</td>
                            </tr>
                            <tr>
                              <td>Kecamatan</td>
                              <td>{{$laykes->kecamatan->nama}}</td>
                            </tr>
                            <tr>
                              <td>Kota Madya</td>
                              <td>{{$laykes->wilayah->nama}}</td>
                            </tr>
                            <tr>
                              <td>No. Telpon</td>
                              <td>{{$laykes->no_telpon}}</td>
                            </tr>
                            <tr>
                              <td>Latitude</td>
                              <td>{{$laykes->latitude}}</td>
                            </tr>
                            <tr>
                              <td>Longitude</td>
                              <td>{{$laykes->longitude}}</td>
                            </tr>
                            <tr>
                              <td>Jumlah Kamar</td>
                              <td>{{$laykes->jumlah_kamar}}</td>
                            </tr>
                            <tr>
                              <td>User</td>
                              <td>{{$laykes->user->name}}</td>
                            </tr>
                            <tr>
                              <td>Created At</td>
                              <td>{{$laykes->created_at}}</td>
                            </tr>
                            <tr>
                              <td>Updated At</td>
                              <td>{{$laykes->updated_at}}</td>
                          </tr>
                          </tbody>
                          </table>
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

