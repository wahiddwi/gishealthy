@extends('layouts.backend.master')
@section('title', 'Tenaga Medis')
@push('page-styles')
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
@endpush
@section('content')

    <div class="section-body">
      <div>
        <a href="{{ route('admin.tenagamedis.create') }}" class="btn btn-primary fas fa-plus" data-toggle="modal" data-target="#modalCreate"> Tambah Tenaga Medis</a>
        <a href="{{ route('admin.download-tenagamedis') }}" class="btn btn-primary fas fa-file-pdf"> Export</a>
    </div>
    <br>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="tenagaMedis">
                    <thead>
                          <tr>
                              <th>No.</th>
                              <th>Jumlah Tenaga Medis</th>
                              <th>Nama Rumah Sakit</th>
                              <th>Created At</th>
                              <th>Updated At</th>
                              <th>Action</th>
                          </tr>
                    </thead>
                    <tbody>
                @foreach ($tenagamedis as $no => $data)
                    <tr>
                    <td>{{ $no+1 }}</td>
                    <td>{{ $data->jumlah_tenaga_medis }}</td>
                    <td>{{ $data->laykes->nama_rumahsakit }}</td>
                    <td>{{ $data->created_at }}</td>
                    <td>{{ $data->updated_at }}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.tenagamedis.edit', $data->id) }}" class="btn btn-sm btn-warning fas fa-edit btn-edit"></a>
                        <a href="#" data-id="{{ $data->id }}" class="btn btn-sm btn-danger fas fa-trash swal-confirm">
                            <form action="{{ route('admin.tenagamedis.destroy', $data->id) }}" id="delete{{ $data->id }}" method="POST">
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
<!-- Modal -->
<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Wilayah</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('admin.tenagamedis.store') }}" method="POST">
          @csrf
        <div class="modal-body">
            <div class="card-body">
              <div class="form-group">
                <label>Jumlah Tenaga Medis</label>
                <input type="text" class="form-control  @error('jumlah_tenaga_medis') is-invalid @enderror" id="inputName" name="jumlah_tenaga_medis"
                placeholder="Jumlah Tenaga Medis" required>
                @error('jumlah_tenaga_medis')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
              <div class="form-group">
                <label>Rumah Sakit</label>
                <select class="form-control @error('id_rumahsakit') is-invalid @enderror" name="id_rumahsakit" required>
                  <option value="">--Pilih Rumah Sakit--</option>
                    @foreach ($laykes as $data)
                      <option value="{{ $data->id }}">{{ $data->nama_rumahsakit }}</option>
                    @endforeach
                </select>
                @error('id_rumahsakit')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
              <div class="form-group">
                <label>Kelurahan</label>
                <select class="form-control @error('id_kelurahan') is-invalid @enderror" name="id_kelurahan" required>
                  <option value="">--Pilih Kelurahan--</option>
                    @foreach ($kelurahan as $data)
                      <option value="{{ $data->id }}">{{ $data->nama }}</option>
                    @endforeach
                </select>
                @error('id_kelurahan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
              <div class="form-group">
                <label>Kecamatan</label>
                <select class="form-control @error('id_kecamatan') is-invalid @enderror" name="id_kecamatan" required>
                  <option value="">--Pilih Kecamatan--</option>
                    @foreach ($kecamatan as $data)
                      <option value="{{ $data->id }}">{{ $data->nama }}</option>
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
                    @foreach ($wilayah as $data)
                      <option value="{{ $data->id }}">{{ $data->nama }}</option>
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
@endsection

@push('page-scripts')
    <script src ="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@endpush

@push('after-scripts')
<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
    <script>
      $(document).ready( function () {
          $('#tenagaMedis').DataTable();
      } );


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
                  $(`#delete${id}`).submit();
                } else {
                //   swal("Your imaginary file is safe!");
                }
              });
        });

    </script>
@endpush

