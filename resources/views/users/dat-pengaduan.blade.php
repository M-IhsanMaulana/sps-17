@extends('user')
@section('title', 'Data Pengaduan')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data of Report</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fa-solid fa-dashboard"></i> Dashboard</a></div>
                <div class="breadcrumb-item active" aria-current="page">Data Pengaduan</div>
            </div>
        </div>

        <div class="section-body">


            @if (Session::has('success'))
                <div class="alert alert-primary alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        {{ Session::get('success') }}
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Pengaduan</h4>
                            <hr>
                            <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-file-export"></i> Export</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th>Pelapor</th>
                                            <th>Melapor Sebagai</th>
                                            <th>Id Pengaduan</th>
                                            <th>Judul Pengaduan</th>
                                            <th>Tgl Lapor</th>
                                            <th>Foto</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1;
                                        @endphp
                                        @foreach ($data as $pengaduan)
                                        <tr>
                                            <td class="text-center">
                                                {{ $no++ }}
                                            </td>
                                            @if ($pengaduan->tipe_pengadu == 'anonim')
                                            <td>Anonim</td>
                                            @else
                                            <td>{{ $pengaduan->nama_pengadu }}</td>
                                            @endif
                                            <td>{{ $pengaduan->tipe_pengadu }}</td>
                                            <td>{{ $pengaduan->idpengaduan }}</td>
                                            <td>{{ $pengaduan->judul_pengaduan }}</td>
                                            <td>{{ $pengaduan->tgl_pengaduan }}</td>
                                            <td>
                                                <img alt="image" src="{{ asset('public/data-image/'. $pengaduan->bukti_pengaduan) }}" class="rounded-circle" width="35" data-toggle="tooltip" title="{{ $pengaduan->judul_pengaduan }}">
                                            </td>
                                            <td>
                                                @if ($pengaduan->status == 'success')
                                                <div class="badge badge-success text-uppercase">{{ $pengaduan->status }}</div>
                                                @elseif ($pengaduan->status == 'process')
                                                <div class="badge badge-warning text-uppercase">{{ $pengaduan->status }}</div>
                                                @else
                                                <div class="badge badge-danger text-uppercase">{{ $pengaduan->status }}</div>
                                                @endif
                                            </td>
                                            <td><a href="{{ route('user.detail-pengaduan', $pengaduan->id) }}" class="btn btn-secondary">Detail</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Modal 1 --}}
</div>
@endsection
