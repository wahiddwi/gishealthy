@extends('layouts.backend.master')
@section('title', 'Edit Artikel')
@push('page-styles')
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endpush
@section('content')
    
<div class="section-body">
    </div>
    @section('modal')
    <div class="container">
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
      <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                      <h3 class="card-title"></h3>
                      
                      @if(Auth::user()->role->id == 1)
                      <form  method="post" action="{{ route('admin.post.update', $post->id) }}" enctype="multipart/form-data"
                      class="form-horizontal">
                      @elseif(Auth::user()->role->id == 3)
                      <form  method="post" action="{{ route('petugas.post.update', $post->id) }}" enctype="multipart/form-data"
                      @endif
                      class="form-horizontal">
                        @csrf
                        @method('put')
                        <div class="form-group">
                          <label for="judul" class="font-weight-bolder">Judul</label>
                        <input type="text" class="form-control" name="judul" value="{{$post->judul}}" aria-describedby="emailHelp" placeholder="Judul">
                        </div>
                        
                        <div class="form-group">
                          <label for="textarea-input" class="form-control-label">Content</label>
                          <textarea name="body" id="summernote" rows="9" class="form-control">{{ $post->body }}</textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Publish</button>
                    </div>
                  </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                  <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <strong>Tambah Gambar</strong>
                          </div>
                          <span id="gambar"></span>
                    </div>
                    <div class="custom-file">
                        <input type="file" name="gambar" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" value="{{ $post->gambar }}" style="overflow: hidden" for="customFile">Choose file</label>
                    </div>
                </form>
                </div>
            </div>
        </div>

    </div>

<script>
    $('#summernote').summernote({
      placeholder: 'Hello stand alone ui',
      tabsize: 2,
      height: 300,
    });
  </script>

@endsection

@push('after-scripts')
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
@endpush