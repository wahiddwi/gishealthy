@extends('layouts.backend.master')
@section('title', 'Kelurahan')
@push('page-styles')
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

@endpush
@section('content')

    <div class="section-body">
      <div>
        <a href="{{route('petugas.kelurahan.create')}}" class="btn btn-primary fas fa-plus" data-toggle="modal" data-target="#btn-create"> Tambah Kelurahan</a>
        <a href="{{ route('petugas.download-kelurahan') }}" class="btn btn-primary fas fa-file-pdf"> Export</a>
    </div>
    <br>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="data_kelurahan">
                    <thead>
                          <tr>
                              <th>No.</th>
                              <th>Nama Kelurahan</th>
                              <th>Nama Kecamatan</th>
                              <th>Nama Wilayah</th>
                              <th>Nama Petugas</th>
                              <th>Created At</th>
                              <th>Updated At</th>
                              <th>Action</th>
                          </tr>
                    </thead>
                    <tbody>
                      @foreach ($kelurahan as $no => $data)
                          <tr>
                            <td>{{ $no+1 }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->kecamatan->nama }}</td>
                            <td>{{ $data->wilayah->nama }}</td>
                            <td>{{ $data->user->name }}</td>
                            <td>{{ $data->created_at }}</td>
                            <td>{{ $data->updated_at }}</td>
                            <td>
                              <a href="{{ route('petugas.kelurahan.edit', $data->id) }}" class="btn btn-warning fa fa-edit"></a>
                              <a href="#" data-id="{{ $data->id }}" class="btn btn-danger fas fa-trash swal-confirm">
                                <form action="{{ route('petugas.kelurahan.destroy', $data->id) }}" id="deleteKelurahan{{ $data->id }}" method="POST">
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
      </div>
        </div>
    </div>
@endsection

@section('modal')
{{-- modal create --}}
<div class="modal fade" id="btn-create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Kelurahan </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('petugas.kelurahan.store') }}" method="POST">
          @csrf
        <div class="modal-body">
            <div class="card-body">
              <div class="form-group">
                <label >Nama </label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" id="inputName" name="nama" placeholder="Nama Kelurahan" autofocus required>
                @error('nama')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
              <div class="form-group">
                <label>Kecamatan</label>
                <select class="form-control @error('id_kecamatan') is-invalid @enderror" name="id_kecamatan" required>
                  <option value="">--Pilih Kecamatan--</option>
                    @foreach ($kecamatan as $item)
                      <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
                @error('id_kecamatan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
              <div class="form-group">
                <label>Wilayah</label>
                <select class="form-control @error('id_wilayah') is-invalid @enderror" name="id_wilayah" required>
                  <option value="">--Pilih Wilayah--</option>
                    @foreach ($wilayah as $w)
                      <option value="{{ $w->id }}">{{ $w->nama }}</option>
                    @endforeach
                </select>
                @error('id_wilayah')
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
        $('#data_kelurahan').DataTable();
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
              $(`#deleteKelurahan${id}`).submit();
            } else {
            //   swal("Your imaginary file is safe!");
            }
          });
    });

</script>
@endpush

