@extends('layouts.backend.master')
@section('title', 'Rumah Sakit')
@push('page-styles')
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

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
        <a href="{{ route('petugas.laykes.create') }}" class="btn btn-primary fas fa-plus"> Tambah Layanan Kesehatan</a>
        <a href="{{ route('petugas.download-rumahsakit') }}" class="btn btn-primary fas fa-file-pdf"> Export</a>
    </div>
    <br>
        {{-- <div class="card">
          <div class="card-body"> --}}
            <div class="table-responsive">
              <table class="table table-striped table-bordered" id="layananKesehatan">
                <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama Layanan</th>
                        <th>Alamat</th>
                        <th>No. Telpon</th>
                        <th>Action</th>
                      </tr>
                </thead>
                <tbody>
                  @foreach ($laykes as $no => $l)
                      <tr>
                        <td>{{ $no+1 }}</td>
                        <td>{{ $l->nama_rumahsakit }}</td>
                        <td>{{ $l->alamat }}</td>
                        <td>{{ $l->no_telpon }}</td>
                        <td class="text-center">
                          <a href="{{ route('petugas.laykes.edit', $l->id) }}" class="btn btn-sm btn-warning fa fa-edit"></a>
                          <a href="#" data-id="{{ $l->id }}" class="btn btn-sm btn-danger fas fa-trash swal-confirm">
                            <form action="{{ route('petugas.laykes.destroy', $l->id) }}" id="deleteLaykes{{ $l->id }}" method="POST">
                            @csrf
                            @method('delete')
                            </form>
                        </a>
                        </td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      {{-- </div>
        </div> --}}
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
    $('#layananKesehatan').DataTable();
} );
</script>
<script>

    $(".swal-confirm").click(function(e) {
        id = e.target.dataset.id;
        swal({
            title: "Yakin Ingin Menghapus Data?",
            text: "Data yang sudah terhapus tidak bisa dikembalikan!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                swal("Data berhasil dihapus!", {
                icon: "success",
              });
              $(`#deleteLaykes${id}`).submit();
            } else {
            //   swal("Your imaginary file is safe!");
            }
          });
    });

</script>
@endpush

