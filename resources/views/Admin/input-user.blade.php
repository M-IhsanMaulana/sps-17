@extends('admin')
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Home /</span> Input User</h4>

      <!-- Basic Layout & Basic with Icons -->
      <div class="row">
        <!-- Basic with Icons -->
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0">Input Data User</h5>
              <small class="text-muted float-end text-danger">Silahkan masukan data yang ingin ditambah</small>
            </div>
            <div class="card-body">
              <form action="{{ route('admin.createuser') }}" method="POST">
                @csrf
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Name</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-fullname2" class="input-group-text"
                        ><i class="bx bx-user"></i
                      ></span>
                      <input
                        type="text"
                        name="name"
                        class="form-control"
                        id="basic-icon-default-fullname"
                        placeholder="Masukan nama"
                        aria-label="Masukan nama"
                        aria-describedby="basic-icon-default-fullname2"
                      />
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-icon-default-username">Username</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-username2" class="input-group-text"
                        ><i class="bx bxs-user"></i
                      ></span>
                      <input
                        type="text"
                        name="username"
                        id="basic-icon-default-username"
                        class="form-control"
                        placeholder="Masukan username"
                        aria-label="Masukan username"
                        aria-describedby="basic-icon-default-username2"
                      />
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Email</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                      <input
                        type="text"
                        name="email"
                        id="basic-icon-default-email"
                        class="form-control"
                        placeholder="Masukan Email"
                        aria-label="Masukan Email"
                        aria-describedby="basic-icon-default-email2"
                      />
                      <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>
                    </div>
                    <div class="form-text">You can use letters, numbers & periods</div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 form-label" for="basic-icon-default-password">Password</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-password2" class="input-group-text"
                        ><i class="bx bx-key"></i
                      ></span>
                      <input
                        type="password"
                        name="password"
                        id="basic-icon-default-password"
                        class="form-control password-mask"
                        placeholder="Masukan Password Default"
                        aria-label="Masukan Password Default"
                        aria-describedby="basic-icon-default-password2"
                      />
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 form-label" for="basic-icon-default-role">Role</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-role2" class="input-group-text"
                        ><i class='bx bxs-user-account'></i></span>
                      <select class="form-select" name="role" id="basic-icon-default-role" aria-label="Please Select Role" aria-describedby="basic-icon-default-role2">
                        <option selected>Silahkan pilih role nya</option>
                        <option value="0">User</option>
                        <option value="1">Petugas</option>
                        <option value="2">Admin</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row justify-content-end">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Create User</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / Content -->
  </div>
@endsection
