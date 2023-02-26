@extends('admin')
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-8 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Selamat datang {{ Auth::user()->name }} 🎉</h5>
                                <p class="mb-4">
                                    SPS-17 Memiliki <span class="fw-bold">{{ $pengaduan->count('pengaduan.id') }}</span> Pengaduan. Silahkan cek pengaduan
                                    dengan klik tombol dibawah
                                </p>

                                <a href="{{ route('admin.data-pengaduan') }}" class="btn btn-sm btn-outline-primary">Lihat Data</a>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140"
                                    alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                    data-app-light-img="illustrations/man-with-laptop-light.png" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 order-1">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <button type="button" class="btn btn-icon btn-outline-success">
                                            <span class="tf-icons bx bx-user"></span>
                                          </button>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                            <a class="dropdown-item" href="{{ route('admin.data-user') }}">View More</a>
                                        </div>
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">User</span>
                                @if ($userdata->count('userdata.id') < 10)
                                <h3 class="card-title mb-2">0{{ $userdata->count('userdata.id') }} User</h3>
                                @else
                                <h3 class="card-title mb-2">{{ $userdata->count('userdata.id') }} User</h3>
                                @endif
                                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> Terdaftar</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <button type="button" class="btn btn-icon btn-outline-primary">
                                            <span class="tf-icons bx bxs-report"></span>
                                          </button>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                            <a class="dropdown-item" href="{{ route('admin.data-pengaduan') }}">View More</a>
                                        </div>
                                    </div>
                                </div>
                                <span>Pengaduan</span>
                                @if ($pengaduan->count('pengaduan.id') < 10)
                                <h5 class="card-title mb-2">0{{ $pengaduan->count('pengaduan.id') }}  Pengaduan</h5>
                                @else
                                <h5 class="card-title mb-2">{{ $pengaduan->count('pengaduan.id') }}  Pengaduan</h5>
                                @endif
                                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> Masuk</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                <div class="row">
                    <div class="col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <button type="button" class="btn btn-icon btn-outline-warning">
                                            <span class="tf-icons bx bx-category"></span>
                                          </button>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                            <a class="dropdown-item" href="{{ route('admin.data-category') }}">View More</a>
                                        </div>
                                    </div>
                                </div>
                                <span class="d-block mb-1">Category</span>
                                @if ($category->count('category.id') < 10)
                                <h4 class="card-title mb-2">0{{ $userdata->count('category.id') }} Category</h4>
                                @else
                                <h4 class="card-title mb-2">{{ $category->count('category.id') }}</h4>
                                @endif
                                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> Terdaftar</small>
                            </div>
                        </div>
                    </div>

                    <!-- </div>
          <div class="row"> -->

                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
