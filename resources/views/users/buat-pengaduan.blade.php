@extends('user')
@section('title', 'Lapor Pengaduan')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Buat Laporan Pengaduan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Buat Pengaduan</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Buat Pengaduan</h2>

                    <div class="">
                        <div class="card">
                            <div class="card-header">
                                <h4>Buat Laporan Pengaduan</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('user.buat-pengaduan.post') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Nama Pelapor</label>
                                        <input type="text" name="nama_pengadu" id="not_anonim" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Mengadu Sebagai </label>
                                        <select class="selectric form-select" id="sebagai" name="tipe_pengadu">
                                            <option value="">Silahkan Pilih Opsi</option>
                                            <option value="siswa">Siswa</option>
                                            <option value="ortu">Orang Tua Siswa</option>
                                            <option value="warga-sekolah">Warga Sekolah Lainnya</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori Pengaduan </label>
                                        <select class="selectric form-select" name="category_id">
                                            <option value="">Silahkan Pilih Opsi</option>
                                            @foreach ($data as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Judul Pengaduan Anda</label>
                                        <input type="text" name="judul_pengaduan" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Detail Mengenai Laporan Anda</label>
                                        <textarea name="detail_pengaduan" id="" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Laporan Anda</label>
                                        <input type="date" name="tgl_pengaduan" class="form-control">
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label  col-12 col-md-3 col-lg-3">Upload Bukti Pengaduan</label>
                                        <div class="col-sm-12 col-md-7">
                                          <div id="image-preview" class="image-preview">
                                            <label for="image-upload" id="image-label">Choose File</label>
                                            <input type="file" name="bukti_pengaduan" id="image-upload" />
                                          </div>
                                        </div>
                                      </div>
                                      <button type="submit" class="btn btn-icon icon-right btn-primary float-right">Submit <i
                                        class="fas fa-arrow-right"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </section>
    </div>
@endsection
