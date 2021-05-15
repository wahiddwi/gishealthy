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
        
                    <div class="row mt-sm-4">
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
                      </div>
                      <div class="col-12 col-md-12 col-lg-7">
                        <div class="card">
                          <form method="post" class="needs-validation" novalidate="">
                            <div class="card-header">
                              <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                  <div class="form-group col-md-6 col-12">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" value="Ujang" required="">
                                    <div class="invalid-feedback">
                                      Please fill in the first name
                                    </div>
                                  </div>
                                  <div class="form-group col-md-6 col-12">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" value="Maman" required="">
                                    <div class="invalid-feedback">
                                      Please fill in the last name
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="form-group col-md-12 col-12">
                                    <label>Email</label>
                                    <input type="email" class="form-control" value="ujang@maman.com" required="">
                                    <div class="invalid-feedback">
                                      Please fill in the email
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                      <label>Password</label>
                                      <input type="text" class="form-control" required="">
                                      <div class="invalid-feedback">
                                        Please fill in the email
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                              <button class="btn btn-primary">Save Changes</button>
                            </div>
                          </form>
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