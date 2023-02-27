@extends('admin')
@section('title', 'My Rekening')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail of Report</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fa-solid fa-dashboard"></i>
                            Dashboard</a></div>
                    <div class="breadcrumb-item active" aria-current="page">Detail Laporan Pengaduan</div>
                </div>
            </div>

            <div class="section-body">
                    <div class="card author-box">
                        <div class="card-header">
                            <h4>Detail Laporan Pengaduan</h4>
                            <hr>
                            <a href="{{ route('admin.data-pengaduan') }}" class="btn btn-primary btn-icon"><i
                                    class="fas fa-arrow-left"></i> Back</a>
                        </div>
                        <div class="card-body">
                            <div class="author-box-left">
                                <a href="#" class="btn" data-toggle="modal" data-target="#exampleModal">
                                    <img alt="image"
                                        src="{{ asset('storage/data-image/' . $pengaduan->bukti_pengaduan) }}"
                                        class="rounded-circle author-box-picture border border-primary">
                                </a>
                                <div class="clearfix"></div>
                                <span class="mb-1">Status :</span>
                                @if ($pengaduan->status == 'process')
                                    <span class="badge badge-warning m-2">Proses</span>
                                @elseif ($pengaduan->status == 'success')
                                    <span class="badge badge-success m-2">Sukses</span>
                                @elseif ($pengaduan->status == 'reject')
                                    <span class="badge badge-danger m-2">Reject / Ditolak</span>
                                @endif
                            </div>
                            <div class="author-box-details">
                                <div class="author-box-name">
                                    <a href="#" id="nama-nasabah">{{ $pengaduan->nama_pengadu }}</a>
                                </div>
                                <div class="author-box-job">Join pada tanggal <span>{{ $pengaduan->tgl_pengaduan }}</span>
                                </div>
                                <hr>
                                <div class="author-box-job">Saldo Anda <span>Rp. {{ $pengaduan->idpengaduan }},-</span>
                                </div>
                                <div class="author-box-description">
                                    <div class="form-group">
                                        <label>Judul Laporan Pengaduan</label>
                                        <input type="text" class="form-control" name="judul_pengaduan"
                                            value="{{ $pengaduan->judul_pengaduan }}" disabled tabindex="-1" required
                                            autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori Pengaduan</label>
                                        <input type="text" class="form-control" name="category"
                                            value="{{ $pengaduan->category->name }}" disabled tabindex="-1" required
                                            autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label>Detail Laporan Pengaduan</label>
                                        <textarea name="" id="" cols="30" rows="10" class="form-control " disabled readonly>{{ $pengaduan->detail_pengaduan }}</textarea>
                                    </div>
                                    <form action="{{ route('admin.update-pengaduan', $pengaduan->id) }}" method="post">
                                        @method('PATCH')
                                        {{ csrf_field() }}
                                        <div class="form-group ">
                                            <label class="text-md-right text-left mt-2">Update Status Laporan</label>
                                            <div class="">
                                                @if ($pengaduan->status !== 'success')
                                                <select class="form-control selectric" name="status">
                                                    @if ($pengaduan->status == 'sending')
                                                        <option value="sending" selected>Sending</option>
                                                        <option value="process">Process</option>
                                                        <option value="reject">Reject</option>
                                                        <option value="success">Success</option>
                                                    @elseif($pengaduan->status == 'process')
                                                        <option value="sending">Sending</option>
                                                        <option value="process" selected>Process</option>
                                                        <option value="reject">Reject</option>
                                                        <option value="success">Success</option>
                                                    @elseif ($pengaduan->status == 'reject')
                                                        <option value="sending" selected>Sending</option>
                                                        <option value="process">Process</option>
                                                        <option value="reject">R9eject</option>
                                                        <option value="success">Success</option>
                                                    @endif
                                                </select>
                                                @else
                                                <select class="selectric form-select" disabled>
                                                    <option value="sending">Sending</option>
                                                    <option value="process">Process</option>
                                                    <option value="reject">Reject</option>
                                                    <option value="success" selected>Success</option>
                                                </select>
                                                @endif
                                            </div>
                                        </div>
                                        @if ($pengaduan->status == 'success' && $pengaduan->tanggapan_pengaduan !== null)
                                        <div class="form-group">
                                            <label>Tanggapan Untuk Laporan Pengaduan</label>
                                            <textarea name="tanggapan_pengaduan" id="" cols="30" rows="10" class="form-control" style="resize:none" disabled>{{ $pengaduan->tanggapan_pengaduan }}</textarea>
                                        </div>
                                        @else
                                        <div class="form-group">
                                            <label>Tanggapan Untuk Laporan Pengaduan</label>
                                            <textarea name="tanggapan_pengaduan" id="" cols="30" rows="10" class="form-control "></textarea>
                                        </div>
                                        @endif
                                        @if ($pengaduan->status == 'success' && $pengaduan->tanggapan_pengaduan !== null)
                                        <button type="submit" class="btn btn-icon icon-right btn-primary" disabled>Submit <i
                                            class="fas fa-arrow-right"></i></button>
                                        @else
                                        <button type="submit" class="btn btn-icon icon-right btn-primary">Submit <i
                                            class="fas fa-arrow-right"></i></button>
                                        @endif
                                    </form>
                                </div>
                                <div class="w-100 d-sm-none"></div>
                                <div class="float-right mt-sm-0 mt-3">
                                    {{-- <a href="#" class="btn">Ubah Pin <i class="fas fa-chevron-right"></i></a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <span>Copyright © Seventeen Bank</span>
                        </div>
                    </div>
            </div>
        </section>

    </div>
@endsection
