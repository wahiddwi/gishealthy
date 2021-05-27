@extends('layouts.backend.master')
@section('title', 'Edit Kecamatan')
@push('page-styles')
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endpush
@section('content')

    <div class="section-body">
        <form action="{{ route('admin.kecamatan.update', $kecamatan->id) }}" method="POST">
            @csrf
            @method('patch')
        
        <div class="card">
            <div class="card-body">
            <div class="form-group">
                <label for="nama">Nama Kecamatan</label>
                <input type="text" name="nama" value="{{ $kecamatan->nama }}" class="form-control @error('nama') is-invalid @enderror" required>
            </div>
            <div class="form-group">
                <label>Wilayah</label>
                <select class="form-control @error('id_wilayah') is-invalid @enderror" name="id_wilayah" required>
                    @foreach ($wilayah as $w)
                      <option value="{{$w->id}}" {{$w->id == $kecamatan->id_wilayah ? 'selected' : ''}}>{{ $w->nama }}</option>
                    @endforeach
                </select>
              </div>
            <div class="card-footer text-right">
                <button class="btn btn-warning fas fa-edit" type="submit">Ubah</button>
                <button class="btn btn-danger fa fa-trash" type="reset">Reset</button>
            </div>
        </div>
    </div>
    </form>
    </div>
@endsection

</div>

@push('page-scripts')
    <script src ="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@endpush

@push('after-scripts')
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
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

