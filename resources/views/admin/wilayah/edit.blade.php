@extends('layouts.backend.master')
@section('title', 'Edit Wilayah')
@push('page-styles')
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endpush
@section('content')

    <div class="section-body">
        <form action="{{ route('admin.wilayah.update', $wilayah->id) }}" method="POST">
            @csrf
            @method('patch')

        {{-- <div class="card"> --}}
            <div class="form-group">
                <label for="nama">Nama Wilayah</label>
                <input type="text" name="nama" value="{{ $wilayah->nama }}"
                class="form-control @error('nama') is-invalid @enderror" required>
                @error('nama')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            <div class="text-right">
                <button class="btn btn-warning fas fa-edit" type="submit">Ubah</button>
                {{-- <button class="btn btn-danger fa fa-trash" type="reset">Reset</button> --}}
            </div>
        </div>
    </form>
    {{-- </div> --}}
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

