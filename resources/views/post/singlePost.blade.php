@extends('layouts.frontend.master')
@section('title', 'Data Tenaga Medis')
@push('page-styles')
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

@endpush
@section('content')

{{-- <div class="site-section stats">
    <div class="container">
    <div class="col-lg-7 text-center mx-auto">
        <h2 class="section-heading">@yield('title')</h2>
    </div> --}}
    <div class="hero-v1">
            
        <div class="container">
            <div class="row align-items-center justify-content-center">
            <div class="col-lg-12 text-center mx-auto">
                {{-- <span class="d-block subheading">{{ date('d/m/Y', strtotime($singlePost->created_at))}}</span> --}}
                <h1 class="heading mb-3">{{$singlePost->judul}}</h1>
              <p class="mb-2"></p>
            </div>
            
            <!-- MAIN -->
            <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-12 blog-content">
                    <div class="row mb-5">
                        <div class="col-12 text-center">
                            <div class="">
                                <img width="100%" width="auto" src="{{ asset($singlePost->gambar) }}" alt=""/>
                            </div>
                        </div>
                </div>  
                <span class="d-block subheading">{{ date('d/m/Y', strtotime($singlePost->created_at))}}</span>
                <p>Author : {{$singlePost->user->name}}</p>
                <p class="lead">{!!$singlePost->body!!}</p>
          </div>
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
        $('#data').DataTable();
    } );
</script>
@endpush

