@extends('layouts.backend.master')
@section('title', 'Edit Kamar')
@push('page-styles')
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endpush
@section('content')

    <div class="section-body">
        <form action="{{ route('petugas.kamar.update', $kamar->id) }}" method="POST">
            @csrf
            @method('patch')

        {{-- <div class="card"> --}}
            <div class="form-group">
                <label for="id_rumahsakit">Nama Rumah Sakit</label>
                <select class="form-control @error('id_rumahsakit') is-invalid @enderror" name="id_rumahsakit" required>
                    @foreach ($laykes as $item)
                      <option value="{{$item->id}}" {{$item->id == $kamar->id_rumahsakit ? 'selected' : ''}}>{{ $item->nama_rumahsakit }}</option>
                    @endforeach
                </select>
                @error('id_rumahsakit')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
                <label for="jenis_kamar">Jenis Kamar</label>
                <select class="form-control @error('id_jeniskamar') is-invalid @enderror" name="id_jeniskamar" required>
                    @foreach ($jenis_kamar as $item)
                      <option value="{{$item->id}}" {{$item->id == $kamar->id_jeniskamar ? 'selected' : ''}}>{{ $item->jenis_kamar }}</option>
                    @endforeach
                </select>
                @error('id_jeniskamar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
                <label for="no_kamar">No. Kamar</label>
                <input type="text" name="no_kamar" value="{{ $kamar->no_kamar }}"
                class="form-control @error('no_kamar') is-invalid @enderror" required>
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
                    <option value="0" @if ($kamar->status == "0") selected @endif>Tersedia</option>
                    <option value="1" @if ($kamar->status == "1") selected @endif>Terisi</option>
                  </select>
                @error('jenis_kelamin')
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

