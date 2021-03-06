@extends('layouts.backend.master')
@section('title', 'Artikel')
@push('page-styles')
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endpush
@section('content')

@if ($errors->any())
@foreach ($errors->all() as $errors)
<div class="alert alert-danger alert-dismissible show fade" role="alert">
  <span class="badge badge-pill badge-danger">Error</span>{{$error}}
  {{-- <div class="alert-body"> --}}
    <button class="close" type="button" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">x</span>
    </button>
  {{-- </div> --}}
</div>
@endforeach
@endif
<div class="section-body">
  <div>
    {{-- <a href="{{route('admin.kelurahan.create')}}" class="btn btn-primary fas fa-plus" data-toggle="modal" data-target="#btn-create"> Tambah Kelurahan</a> --}}
    {{-- <a href="{{ route('admin.post-download',  $post->id) }}" target="_blank" class="btn btn-primary fas fa-file-pdf"> Export</a> --}}
  </div>
        <br>
        <div class="card">
          <div class="card-body">
            <h6 style="text-align: center">{{ $post->judul }}</h6>
            <p><i class="far fa-calendar-alt" style="font-size: 2em"></i> {{ $post->created_at->format('d-m-Y') }}</p>
            <p><i class="fas fa-user-tie" style="font-size: 2em" > </i> <b>{{ $post->user->name }}</b></p>
            <p style="text-align: center"><img src="{{ asset($post->gambar) }}" width="400"></p>
            {{-- <p><b>{{ Auth::user()->role->name }}</b></p> --}}
            {{-- <hr> --}}
            <div><br></div>
            <div>{!!$post->body!!}</div>
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
              $(`#deletePost${id}`).submit();
            } else {
            //   swal("Your imaginary file is safe!");
            }
          });
    });
</script>

@endpush

