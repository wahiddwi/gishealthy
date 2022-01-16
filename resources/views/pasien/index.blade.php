@extends('layouts.frontend.master')
@section('title', 'Data Pasien')
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
            <a href="{{ route('pasien.download') }}" class="btn btn-primary fas far fa-file-pdf"> Export</a>
            </div>
        {{-- <div class="card">
            <div class="card-body"> --}}
                <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="data_wilayah">
                    <thead>
                        <tr class="text-center">
                            <th>No.</th>
                            {{-- <th>NIK</th>
                            <th>Nama</th> --}}
                            <th>Jenis Kelamin</th>
                            <th>Usia</th>
                            <th>Status</th>
                            <th>Nama Rumah Sakit</th>
                            <th>Tanggal Masuk</th>
                            <th>Tanggal Keluar</th>
                            {{-- <th>Action</th> --}}
                          </tr>
                    </thead>
                    <tbody>
                        @foreach ($pasien as $p)
                        <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        {{-- <td>{{ $p->nik }}</td>
                        <td>{{ $p->nama_pasien }}</td> --}}
                        <td>{{ $p->jenis_kelamin }}</td>
                        <td>{{ $p->usia }}</td>
                        <td>{{ $p->status }}</td>
                        <td>{{ $p->laykes->nama_rumahsakit }}</td>
                        <td>{{ $p->created_at->format('d - m - Y') }}</td>
                            @if ($p->tanggal_keluar == null)
                                <td>{{$p->tanggal_keluar}}</td>
                            @else
                                <td>{{$p->updated_at->format('d - m - Y')}}</td>
                            @endif
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
        $('#data_wilayah').DataTable();
    } );
</script>
@endpush

