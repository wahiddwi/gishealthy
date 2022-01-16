@extends('layouts.backend.master')
@section('title', 'Detail Pasien')
@push('page-styles')
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <!--Leaflet-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin="">
  </script>
@endpush
@section('content')

    <div class="section-body">
      <div>
        <a href="{{ route('petugas.pasien.index') }}" class="btn btn-primary " style="float: right;">Kembali <i class="fas fa-share"></i></a>
        <a href="{{ route('petugas.download-detail-pasien', $pasien->id) }}" class="btn btn-primary fas far fa-file-pdf" style="float: left;"> Export</a>
    </div>
    <br>
    <div class="card">
        </div>
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-md">
                        <tbody>
                        <tr>
                            <th>NIK</th>
                            <th>{{ $pasien->nik }}</th>
                        </tr>
                        <tr>
                            <td>Nama Pasien</td>
                            <td>{{$pasien->nama_pasien}}</td>
                        </tr>
                        <tr>
                          <td>Jenis Kelamin</td>
                          <td>{{$pasien->jenis_kelamin}}</td>
                        </tr>
                        <tr>
                          <td>Usia</td>
                          <td>{{$pasien->usia}}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>{{$pasien->alamat}}</td>
                        </tr>
                        <tr>
                            <td>No. Telpon</td>
                            <td>{{$pasien->no_telpon}}</td>
                          </tr>
                        <tr>
                          <td>Status Pasien</td>
                          <td>{{$pasien->status}}</td>
                        </tr>
                        <tr>
                            <td>Nama Rumah Sakit</td>
                            <td>{{$pasien->laykes->nama_rumahsakit}}</td>
                        </tr>
                        <tr>
                            <td>Jenis Kamar</td>
                            <td>{{$pasien->kamar->jenis_kamar->jenis_kamar}}</td>
                        </tr>
                        <tr>
                            <td>No. Kamar</td>
                            <td>{{$pasien->kamar->no_kamar}}</td>
                        </tr>
                        <tr>
                          <td>Tanggal Masuk</td>
                          <td>{{$pasien->created_at->format('d - m - Y')}}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Keluar</td>
                            @if ($pasien->tanggal_keluar == null)
                                <td>{{$pasien->tanggal_keluar}}</td>
                            @else
                                <td>{{$pasien->updated_at->format('d - m - Y')}}</td>
                            @endif
                          </tr>
                        </tbody>
                        </table>
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
<script>

    // $(".swal-confirm").click(function(e) {
    //     id = e.target.dataset.id;
    //     swal({
    //         title: "Yakin Ingin Menghapus Data?",
    //         text: "Data yang sudah terhapus tidak bisa dikembalikan!",
    //         icon: "warning",
    //         buttons: true,
    //         dangerMode: true,
    //       })
    //       .then((willDelete) => {
    //         if (willDelete) {
    //             swal("Data berhasil dihapus!", {
    //             icon: "success",
    //           });
    //           $(`#deleteLaykes${id}`).submit();
    //         } else {
    //         //   swal("Your imaginary file is safe!");
    //         }
    //       });
    // });

</script>
@endpush

