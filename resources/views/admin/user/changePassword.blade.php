@extends('layouts.backend.master')
@section('title', 'Profil')
@push('page-styles')
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endpush
@section('content')

    <div class="section-body">
        {{-- <div class="card"> --}}
            {{-- <div class="card-header">
              <h4>Full Width</h4>
            </div> --}}
            {{-- <div class="card-body p-0"> --}}

                <div class="section-body">
                    <h2 class="section-title">Hi, {{Auth::user()->name}}</h2>
                    {{-- <p class="section-lead">
                      Change information about yourself on this page.
                    </p> --}}
        
                    {{-- <div class="row mt-sm-4">
                      <div class="col-12 col-md-12 col-lg-5">
                        <div class="card">
                            <div class="user-item">
                                <img alt="image" src="../assets/img/avatar/avatar-1.png" class="img-fluid">
                                <div class="user-details">
                                  <div class="user-cta">
                                    <button class="btn btn-primary follow-btn" data-follow-action="alert('user1 followed');" data-unfollow-action="alert('user1 unfollowed');">Follow</button>
                                  </div>
                                </div>
                              </div>
                        </div>
                      </div> --}}
                      <div class="col-12 col-md-12 col-lg-7">
                        <div class="card">
                          @if(Auth::user()->role->id == 1)
                          <form method="post" action="{{ route('admin.password.update') }}" class="needs-validation" novalidate="">
                            @elseif(Auth::user()->role->id == 3)
                            <form method="post" action="{{ route('petugas.password.update') }}" class="needs-validation" novalidate="">
                          @endif
                            @csrf
                            @method('put')
                            <div class="card-header">
                              <h4>Ubah Password</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                  <div class="form-group col-md-12 col-12">
                                    <label for="old_password">Password Lama</label>
                                    <input type="password" class="form-control @error('old_password') is-invalid @enderror" 
                                    id="old_password" name="old_password"
                                    placeholder="Masukkan password lama">
                                    @error('old_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                  </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                      <label for="password">Password Baru</label>
                                      <input type="password" class="form-control @error('password') is-invalid @enderror"
                                      id="password" name="password"
                                      placeholder="Masukkan password baru">
                                      @error('password')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                      @enderror
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                      <label for="password_confirmation">Konfirmasi Password Baru</label>
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" 
                                    id="password_confirmation" name="password_confirmation" 
                                    placeholder="Masukkan konfirmasi password">
                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                  </div>
                                </div>
                              </div>
                              <div class="card-footer text-right">
                                <button class="btn btn-primary">Ubah Password</button>
                              </div>
                            </form>
                              </div>
                            </div>
                        </div>
                      </div>
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