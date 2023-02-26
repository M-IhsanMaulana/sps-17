@extends('admin')
@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Data Pengaduan</h5>
                <a href="{{ route('admin.data-pengaduan') }}" class="btn btn-outline-primary btn-sm float-end"><i class='bx bxs-file-export'></i> Back</a>
            </div>
            <!-- Account -->
            <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img src="{{ asset('storage/data-image/' . $pengaduan->bukti_pengaduan) }}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                    <div class="button-wrapper">
                        {{-- <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                <i class="bx bx-reset d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Lihat Gambar</span>
                              </button> --}}
                        <p class="text-muted mb-0">Laporan dilakukan pada {{ $pengaduan->tgl_pengaduan }} oleh user dengan id {{ $pengaduan->user_id }}</p>
                    </div>
                </div>

            </div>
            <hr class="my-0" />
            <div class="card-body">
                <form id="formDetail" method="POST" action="/admin/data-pengaduan/{{ $pengaduan->id }}/detail/update">
                    @method('PATCH')
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="idPengaduan" class="form-label">Id Pengaduan</label>
                            <input class="form-control" type="text" id="idPengaduan" name="idpengaduan" value="{{ $pengaduan->idpengaduan }}" readonly />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="category" class="form-label">Kategori yang diadukan</label>
                            <input class="form-control" type="text" name="category" id="category" value="{{ $pengaduan->category->name }}" readonly />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="nama_pengadu" class="form-label">Nama Pelapor</label>
                            <input class="form-control" type="text" id="nama_pengadu" name="nama_pengadu" value="{{ $pengaduan->nama_pengadu }}" readonly />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="tgl_pengaduan" class="form-label">Tanggal Lapor</label>
                            <input type="date" class="form-control" id="tgl_pengaduan" name="tgl_pengaduan" value="{{ $pengaduan->tgl_pengaduan }}" readonly />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="judul_pengaduan" class="form-label">Judul Pengaduan</label>
                            <input class="form-control" type="text" id="judul_pengaduan" name="judul_pengaduan" value="{{ $pengaduan->judul_pengaduan }}" readonly />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="detail_pengaduan" class="form-label">Detail / Deskripsi</label>
                            <textarea name="detail-pengaduan" class="form-control" id="detail_pengaduan" rows="3" style="resize:none" readonly>{{ $pengaduan->detail_pengaduan }}</textarea>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label class="form-label" for="country">Status</label>
                            @if ($pengaduan->status !== 'success')
                            <select id="country" name="status" class="select2 form-select">
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
                                <option value="reject">Reject</option>
                                <option value="success">Success</option>
                                @endif
                            </select>
                            @else
                            <select id="country" class="select2 form-select" disabled>
                                <option value="sending">Sending</option>
                                <option value="process">Process</option>
                                <option value="reject">Reject</option>
                                <option value="success" selected>Success</option>
                            </select>
                            @endif
                        </div>
                        @if ($pengaduan->status == 'success' && $pengaduan->tanggapan_pengaduan !== null)
                        <div class="mb-3 col-md-12">
                            <label for="nama_pengadu" class="form-label">Tanggapan Mengenai Pengaduan</label>
                            <textarea name="detail-pengaduan" class="form-control" id="address" rows="3" style="resize:none" readonly>{{ $pengaduan->tanggapan_pengaduan }}</textarea>
                        </div>
                        @else
                        <div class="mb-3 col-md-12">
                            <label for="tanggapan_pengaduan" class="form-label">Tanggapan Mengenai Pengaduan</label>
                            <textarea name="tanggapan_pengaduan" class="form-control" id="tanggapan_pengaduan" rows="3" style="resize:none"></textarea>
                        </div>
                        @endif
                    </div>
                    <div class="mt-2">
                        @if($pengaduan->status == 'success' && $pengaduan->tanggapan_pengaduan !== null)
                        <button type="submit" class="btn btn-primary me-2 disabled">Save changes</button>
                        @else
                        <button type="submit" class="btn btn-primary me-2 disabled">Save changes</button>
                        @endif
                    </div>
                </form>
            </div>
            <!-- /Account -->
        </div>
    </div>
</div>
@endsection
