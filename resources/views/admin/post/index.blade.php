@extends('layouts.backend.master')
@section('title', 'Artikel')
@push('page-styles')
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

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
        <div>
          @if(Auth::user()->role->id == 1)
          <a href="{{ route('admin.post.create') }}" class="btn btn-primary">Tambah Tulisan</a>
          @elseif(Auth::user()->role->id == 3)
          <a href="{{ route('petugas.post.create') }}" class="btn btn-primary">Tambah Tulisan</a>
          @endif
        </div>
        <br>
        <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered" id="data_artikel">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Judul</th>
                          <th>Slug</th>
                          {{-- <th>Konten</th> --}}
                          {{-- <th>Gambar</th> --}}
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($posts as $no => $post)                    
                      <tr>
                          <td>{{ $no+1 }}</td>
                          <td>{{ $post->judul }}</td>
                          <td>{{ $post->slug }}</td>
                          {{-- <td>{{ $post->body }}</td> --}}
                          {{-- <td>{{ $post->gambar }}</td> --}}
                          <td>
                            @if(Auth::user()->role->id == 1)
                              <a href="{{ route('admin.post.show', $post->id) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                              @elseif(Auth::user()->role->id == 3)
                              <a href="{{ route('petugas.post.show', $post->id) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                            @endif
                            @if(Auth::user()->role->id == 1)
                              <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                              @elseif(Auth::user()->role->id == 3)
                              <a href="{{ route('petugas.post.edit', $post->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            @endif

                            @if (Auth::user()->role->id == 1)
                              <a href="#" data-id="{{$post->id}}" class="btn btn-sm btn-danger fas fa-trash swal-confirm">
                              <form action="{{ route('admin.post.destroy', $post->id) }}" id="deletePost{{ $post->id }}" method="POST">
                              @elseif(Auth::user()->role->id == 3)
                                <a href="#" data-id="{{$post->id}}" class="btn btn-sm btn-danger fas fa-trash swal-confirm">
                                <form action="{{ route('petugas.post.destroy', $post->id) }}" id="deletePost{{ $post->id }}" method="POST">  
                            @endif
                            @csrf
                            @method('delete')
                          </form>
                            </a>
                          </td>
                        </tr>
                    @endforeach
                  </tbody>
              </table>
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
        $('#data_artikel').DataTable();
    } );
</script>  
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

