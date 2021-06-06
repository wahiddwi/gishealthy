@extends('layouts.backend.master')
@section('title', 'Data Pasien')
@push('page-styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endpush
@section('content')

    <div class="section-body">
      <div>
        <a href="{{ route('admin.pasien.create') }}" class="btn btn-primary fas fa-plus"> Tambah Pasien</a>
        <a href="{{ route('admin.pasien-download') }}" class="btn btn-primary fas fa-file-pdf"> Export</a>
    </div>
    <br>
        {{-- <div class="card"> --}}
          {{-- <div class="card-body"> --}}
            <div class="table-responsive">
              <table class="table table-striped table-bordered" id="data_rumahsakitKota">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
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
                    @foreach ($pasien as $p)
                        <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->nama_pasien }}</td>
                        <td>{{ $p->jenis_kelamin }}</td>
                        <td>{{ $p->usia }}</td>
                        <td>{{ $p->wilayah->nama }}</td>
                        <td>{{ $p->kecamatan->nama }}</td>
                        <td>{{ $p->kelurahan->nama }}</td>
                        <td>{{ $p->status }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.pasien.edit', $p->id) }}" class="btn btn-sm btn-warning fa fa-edit"></a>
                            <a href="#" data-id="{{ $p->id }}" class="btn btn-sm btn-danger fas fa-trash swal-confirm">
                                <form action="{{ route('admin.pasien.destroy', $p->id) }}" id="deletePasien{{ $p->id }}" method="POST">
                                @csrf
                                @method('delete')
                                </form>
                            </a>
                          </td>
                          @endforeach
                        </tr>
              </tbody>
          </table>
      </div>
        {{-- </div> --}}
    {{-- </div> --}}

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
          $('#data_rumahsakitKota').DataTable();
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
              $(`#deletePasien${id}`).submit();
            } else {
            //   swal("Your imaginary file is safe!");
            }
          });
    });

</script>
@endpush
