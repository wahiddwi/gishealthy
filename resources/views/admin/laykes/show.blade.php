@extends('layouts.backend.master')
@section('title', 'Detail Layanan Kesehatan')
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
        <a href="{{ route('petugas.pemetaan') }}" class="btn btn-primary " style="float: right;">Kembali <i class="fas fa-share"></i></a>
        <a href="{{ route('petugas.download-detail-laykes', $laykes->id) }}" class="btn btn-primary fas far fa-file-pdf" style="float: left;"> Export</a>
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
                            <td>{{App\Kamar::where('id_rumahsakit',$laykes->id)->where('status',false)->count()}} Kamar</td>
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

