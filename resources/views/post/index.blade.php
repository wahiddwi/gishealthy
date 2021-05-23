@extends('layouts.frontend.master')
@section('title', 'Artikel')
@push('page-styles')
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

@endpush
@section('content')

<div class="site-section stats">
    <div class="container">
    <div class="col-lg-7 text-center mx-auto">
        <h2 class="section-heading">@yield('title')</h2>
    </div>
    <div class="section-body">
        <br>
        {{-- <div class="card"> --}}
            {{-- <div class="card-body"> --}}
                <div class="row">
                    @foreach ($post as $post)
                    <div class="col-lg-4">
                        <div class="post-entry">
                          <a href="{{ route('post.artikelDetail', $post->id) }}" class="thumb">
                            <span class="date">{{$post->created_at->diffForHumans()}}</span>
                            <img src="{{ asset($post->gambar) }}" alt="Image" class="img-fluid" width="200px">
                          </a>
                          <div class="post-meta text-center">
                            <a href="">
                              <span class="icon-user"></span>
                              <span>{{$post->user->name}}</span>
                            </a>
                          </div>
                          <h3><a href="{{ route('post.artikelDetail', $post->id) }}">{{ $post->judul }}</a></h3>
                        </div>
                      </div>
                      @endforeach
                    </div>
                {{-- </div> --}}
            {{-- </div> --}}
            
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
        $('#data_wilayah').DataTable();
    } );
</script>
@endpush

