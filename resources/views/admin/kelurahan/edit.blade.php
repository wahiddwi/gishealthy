@extends('layouts.backend.master')
@section('title', 'Edit Kelurahan')
@push('page-styles')
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endpush
@section('content')

    <div class="section-body">
        <form action="{{ route('admin.kelurahan.update', $kelurahan->id) }}" method="POST">
            @csrf
            @method('put')

        <div class="card">
            <div class="card-body">
            <div class="form-group">
                <label for="nama">Nama Kelurahan</label>
                <input type="text" name="nama" value="{{ $kelurahan->nama }}"
                class="form-control @error('nama') is-invalid @enderror" required>
                @error('nama')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Kecamatan</label>
                <select class="form-control @error('id_kecamatan') is-invalid @enderror" name="id_kecamatan" required>
                    @foreach ($kecamatan as $item)
                      <option value="{{$item->id}}" {{$item->id == $kelurahan->id_kecamatan ? 'selected' : ''}}>{{ $item->nama }}</option>
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
                    @foreach ($wilayah as $w)
                      <option value="{{$w->id}}" {{$w->id == $kelurahan->id_wilayah ? 'selected' : ''}}>{{ $w->nama }}</option>
                    @endforeach
                </select>
                @error('id_wilayah')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
            <div class="card-footer text-right">
                <button class="btn btn-warning fas fa-edit" type="submit">Ubah</button>
                {{-- <button class="btn btn-danger fa fa-trash" type="reset">Reset</button> --}}
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

