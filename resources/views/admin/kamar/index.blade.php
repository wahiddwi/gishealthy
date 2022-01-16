@extends('layouts.backend.master')
@section('title', 'Kamar')
@push('page-styles')
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

@endpush
@section('content')

    <div class="section-body">
      <div>
        <button href="{{ route('petugas.kamar.create') }}" class="btn btn-primary" data-toggle="modal" data-target="#modalCreate">Tambah Jenis Kamar</button>
        <a href="{{ route('petugas.download-kamar') }}" class="btn btn-primary fas fa-file-pdf"> Export</a>

    </div>
    <br>
        {{-- <div class="card">
            <div class="card-body"> --}}
                <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="data_wilayah">
                    <thead>
                          <tr>
                              <th>No.</th>
                              <th>Rumah Sakit</th>
                              <th>Jenis Kamar</th>
                              <th>No. Kamar</th>
                              <th>Status</th>
                              <th>Action</th>
                          </tr>
                    </thead>
                    <tbody>
                      @foreach ($kamar as $no => $km)
                    <tr>
                    <td>{{ $no+1 }}</td>
                    <td>{{ $km->rumah_sakit->nama_rumahsakit }}</td>
                    <td>{{ $km->jenis_kamar->jenis_kamar }}</td>
                    <td>{{ $km->no_kamar }}</td>
                    <td>{{ $km->status ? "Tidak Tersedia" : "Tersedia" }}</td>
                    <td>
                        {{-- <a href="#" class="btn btn-info" data-toggle="modal" data-target="#modalInfo-{{$u->id}}"><i class="fas fa-info"></i></a> --}}
                        <a href="{{ route('petugas.kamar.edit', $km->id) }}" class="btn btn-warning fas fa-edit btn-edit"></a>
                        <a href="#" data-id="{{ $km->id }}" class="btn btn-danger fas fa-trash swal-confirm">
                            <form action="{{ route('petugas.kamar.destroy', $km->id) }}" id="deleteWilayah{{ $km->id }}" method="POST">
                            @csrf
                            @method('delete')
                            </form>
                        </a>
                    </td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
          </div>
      {{-- </div>
        </div> --}}
    </div>
@endsection

@section('modal')
{{-- modal create --}}
<!-- Modal -->
<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Kamar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('petugas.kamar.store') }}" method="POST">
          @csrf
        <div class="modal-body">
            <div class="card-body">
              <div class="form-group">
                <label for="nama">Nama Rumah Sakit</label>
                <select class="form-control @error('id_rumahsakit') is-invalid @enderror" name="id_rumahsakit" required>
                    <option value="">--Pilih Rumah Sakit--</option>
                      @foreach ($laykes as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_rumahsakit }}</option>
                      @endforeach
                  </select>
                  @error('id_rumahsakit')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="nama">Jenis Kamar</label>
                <select class="form-control @error('id_jeniskamar') is-invalid @enderror" name="id_jeniskamar" required>
                    <option value="">--Pilih Jenis Kamar--</option>
                      @foreach ($jenis_kamar as $item)
                        <option value="{{ $item->id }}">{{ $item->jenis_kamar }}</option>
                      @endforeach
                  </select>
                  @error('id_jeniskamar')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="nama">No. Kamar</label>
                <input type="text" class="form-control @error('no_kamar') is-invalid @enderror" id="inputName" name="no_kamar" placeholder="No. Kamar" required>
                @error('no_kamar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
              <div class="form-group">
                <label for="inputEmail4">Status</label>
                <select id="inputState" class="form-control @error('status') is-invalid @enderror" name="status" required>
                    <option selected="">--Pilih Status--</option>
                    <option value="0">Tersedia</option>
                    <option value="1">Terisi</option>
                  </select>
                @error('jenis_kelamin')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
      </form>
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
              $(`#deleteWilayah${id}`).submit();
            } else {
            //   swal("Your imaginary file is safe!");
            }
          });
    });

</script>
@endpush

