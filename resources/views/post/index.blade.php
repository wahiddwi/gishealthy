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
                    @foreach ($post as $p)
                    <div class="col-lg-4">
                        {{-- <div class="post-entry"> --}}
                        <div class="post-entry card" style="width: 20rem;">
                          <a href="{{ route('post.artikelDetail', $p->id) }}" class="thumb">
                            <span class="date">{{$p->created_at->diffForHumans()}}</span>
                            <img class="card-img-top" src="{{ asset($p->gambar) }}" alt="Image" class="img-fluid">
                          </a>
                          <div class="post-meta text-center card-body">
                            <a href="">
                                <span class="icon-user"></span>
                                <span>{{$p->user->name}}</span>
                            </a>
                        </div>
                        
                        {{-- <div class="card-body"> --}}
                              <h3><a href="{{ route('post.artikelDetail', $p->id) }}" class="card-text">{{ $p->judul }}</a></h3>
                          {{-- </div> --}}
                        </div>
                      </div>
                      @endforeach
                    </div>
                {{-- </div> --}}
            {{-- </div> --}}
            
        </div>
    </div>
</div>
{{ $post->links() }}
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

