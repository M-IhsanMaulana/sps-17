@extends('admin')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="/admin">Home</a> /</span> Data Pengaduan</h4>

            <!-- Bootstrap Table with Caption -->
            {{-- <a href="" class="btn btn-outline-primary btn-sm float-end">Download</a> --}}
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Data Pengaduan</h5>
                    <a href="" class="btn btn-success float-end"><i class='bx bxs-file-export'></i> Export</a>
                </div>
                {{-- <h5 class="card-header">Data Pengaduan</h5> --}}
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <caption class="ms-4">
                            Total Pengaduan : {{ $data->count('pengaduan.id') }}
                        </caption>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id User</th>
                                <th>Nama</th>
                                <th>Id Pengaduan</th>
                                <th>Judul</th>
                                <th>Tanggal</th>
                                <th>Bukti</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @if ($data->count('pengaduan.id') === 0)
                                <tr>
                                    <td colspan="8" class="justify-content-center align-items-center text-center text-muted" >Belum ada data nya.</td>
                                </tr>
                            @else
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->user_id }}</td>
                                        <td>{{ $item->nama_pengadu }}</td>
                                        <td>{{ $item->idpengaduan }}</td>
                                        <td>{{ $item->judul_pengaduan }}</td>
                                        <td>{{ $item->tgl_pengaduan }}</td>
                                        <td>
                                            <img src="{{ asset('storage/data-image/' . $item->bukti_pengaduan) }}"
                                                alt="Avatar" class="rounded-circle avatar" />
                                        </td>
                                        @if ($item->status == 'success')
                                            <td><span class="badge bg-label-success me-1">{{ $item->status }}</span></td>
                                        @elseif($item->status == 'process')
                                            <td><span class="badge bg-label-warning me-1">{{ $item->status }}</span></td>
                                        @elseif ($item->status == 'reject')
                                            <td><span class="badge bg-label-danger me-1">{{ $item->status }}</span></td>
                                        @else
                                        <td><span class="badge bg-label-info me-1">{{ $item->status }}</span></td>
                                        @endif
                                        <td>
                                            <a href="/admin/data-pengaduan/{{ $item->id }}/detail" class="btn btn-sm rounded-pill btn-primary"><i
                                                    class='bx bx-list-ul'></i></a>
                                            <a href="/admin/data-pengaduan/{{ $item->id }}/delete" class="btn btn-sm rounded-pill btn-danger"><i
                                                    class='bx bx-trash-alt'></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div class="content-wrapper">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
            <!-- Bootstrap Table with Caption -->
        </div>
        <!-- / Content -->


        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
@endsection
