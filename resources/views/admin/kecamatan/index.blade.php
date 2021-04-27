@extends('layouts.backend.master')
@section('title', 'Kecamatan')
@push('page-styles')
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

@endpush
@section('content')

    <div class="section-body">
      <div>
        <a href="{{route('admin.kecamatan.create')}}" class="btn btn-primary fas fa-plus" data-toggle="modal" data-target="#btn-create"> Tambah Kecamatan</a>
        <a href="{{ route('admin.download-kecamatan') }}" class="btn btn-primary fas fa-file-pdf"> Export</a>
    </div>
    <br>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="data_kecamatan">
                    <thead>
                          <tr>
                              <th>No.</th>
                              <th>Nama Kecamatan</th>
                              <th>Nama Wilayah</th>
                              <th>Created At</th>
                              <th>Updated At</th>
                              <th>Action</th>
                          </tr>
                    </thead>
                    <tbody>
                      @foreach ($kecamatan as $no => $k)
                          <tr>
                            <td>{{ $no+1 }}</td>
                            <td>{{ $k->nama }}</td>
                            <td>{{ $k->wilayah->nama }}</td>
                            <td>{{ $k->created_at }}</td>
                            <td>{{ $k->updated_at }}</td>
                            <td>
                              <a href="{{ route('admin.kecamatan.edit', $k->id) }}" class="btn btn-warning fa fa-edit"></a>
                              <a href="#" data-id="{{ $k->id }}" class="btn btn-danger fas fa-trash swal-confirm">
                                <form action="{{ route('admin.kecamatan.destroy', $k->id) }}" id="deleteKecamatan{{ $k->id }}" method="POST">
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
              {{-- <div class="card-footer text-right">
                <nav class="d-inline-block">
                  <ul class="pagination mb-0">
                    <li class="page-item disabled">
                      <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                    <li class="page-item">
                      <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                    </li>
                  </ul>
                </nav>
              </div> --}}
        </div>
    </div>
@endsection

@section('modal')
{{-- modal create --}}
<div class="modal fade" id="btn-create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Kecamatan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('admin.kecamatan.store') }}" method="POST">
          @csrf
        <div class="modal-body">
            <div class="card-body">
              <div class="form-group">
                <label @error('nama')
                    class="text-danger"
                @enderror>Nama @error('nama')
                    | {{$message}}
                @enderror</label>
                <input type="text" class="form-control" value="{{ old('nama') }}" id="inputName" name="nama" placeholder="Nama Kecamatan" autofocus>
              </div>
              <div class="form-group">
                <label>Wilayah</label>
                <select class="form-control" name="id_wilayah">
                  <option>--Pilih Wilayah--</option>
                    @foreach ($wilayah as $w)
                      <option value="{{ $w->id }}">{{ $w->nama }}</option>
                    @endforeach
                </select>
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
        $('#data_kecamatan').DataTable();
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
              $(`#deleteKecamatan${id}`).submit();
            } else {
            //   swal("Your imaginary file is safe!");
            }
          });
    });

</script>
@endpush

