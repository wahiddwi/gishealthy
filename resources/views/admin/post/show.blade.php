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
    <a href="{{route('admin.kelurahan.create')}}" class="btn btn-primary fas fa-plus" data-toggle="modal" data-target="#btn-create"> Tambah Kelurahan</a>
    <a href="#" class="btn btn-primary fas fa-file-pdf"> Export</a>
  </div>
        <br>
        <div class="card">
          <div class="card-body">
            <h1>{{ $post->judul }}</h1>
            <p>Created At : {{ $post->created_at }}</p>
            <p>Author : {{ Auth::user()->name }}</p>
            <p><b>{{ Auth::user()->role->name }}</b></p>
            <hr>
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

