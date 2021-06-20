@extends('layouts.backend.master')
@section('title', 'User Management')
@push('page-styles')
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endpush
@section('content')

    <div class="section-body">
        <div class="card">
            {{-- <div class="card-header">
              <h4>Full Width</h4>
            </div> --}}
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-md">
                  <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                  </thead>
                  <tbody>
                    @foreach ($user as $no => $u)
                    <tr>
                    <td>{{ $no+1 }}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>{{ $u->role->name }}</td>
                    <td>{{ $u->created_at }}</td>
                    <td>{{ $u->updated_at }}</td>
                    <td class="text-center">
                        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalInfo-{{$u->id}}"><i class="fas fa-info"></i></a>
                        <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdit-{{$u->id}}"><i class="fas fa-edit"></i></a>
                        <a href="#" data-id="{{ $u->id }}" class="btn btn-danger btn-sm fas fa-trash swal-confirm">
                            <form action="{{ route('admin.user.destroy', $u->id) }}" id="deleteUser{{ $u->id }}" method="POST">
                                @csrf
                                @method('delete')
                            </form>
                        </a>
                    </td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
            <div class="card-footer text-right">
              <nav class="d-inline-block">
                <ul class="pagination mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                  </li>
                  <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">2</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
    </div>

@endsection
{{-- Modal --}}

@section('modal')
<!--Modal Info-->
@foreach ($user as $u)
  <div class="modal fade" id="modalInfo-{{$u->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Pengguna</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group row">
                <label for="inputNama" class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                  <p class="form-control-static">{{$u->name}}</p>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                  <p class="form-control-static">{{$u->email}}</p>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputRole" class="col-sm-3 col-form-label">Role</label>
                <div class="col-sm-9">
                  <p class="form-control-static">{{$u->role->name}}</p>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  <!--Modal Edit-->
  <div class="modal fade" id="modalEdit-{{$u->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin.user.update', $u->id) }}" id="editUser-{{$u->id}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
            <div class="card-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">Nama</label>
                  <div class="col-sm-9">
                    <input type="name" class="form-control" id="inputName" value="{{$u->name}}" placeholder="Nama Lengkap" readonly>
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <input type="email" class="form-control" id="inputEmail" value="{{$u->email}}" placeholder="Email" readonly>
                    </div>
                  </div>
                <fieldset class="form-group">
                  <div class="row">
                    <div class="col-form-label col-sm-3 pt-0">Role</div>
                    <div class="col-sm-9">
                      <div class="form-check">
                        @foreach ($role as $r)
                          <div class="radio">
                              <label class="radio1" for="form-check-label">
                                  <input type="radio" name="role" id="radio1" value="{{ $r->id }}"
                                  class="form-check-input" {{ $u->role->id == $r->id ? 'checked' : "" }}>{{$r->name}}
                                </label>
                            </div>
                            @endforeach
                      </div>
                    </div>
                  </div>
                </fieldset>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" onclick="event.preventDefault();
            document.getElementById('editUser-{{$u->id}}').submit();">
            Save changes
        </button>
    </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach
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
              $(`#deleteUser${id}`).submit();
            } else {
            //   swal("Your imaginary file is safe!");
            }
          });
    });
</script>
@endpush

