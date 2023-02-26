@extends('admin')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="/admin">Home</a> /</span> Data User</h4>

            <!-- Bootstrap Table with Caption -->
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Data Category</h5>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#categorymodal"><i
                            class='bx bx-list-plus'></i> Tambah</button>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <caption class="ms-4">
                            Total Category : {{ $data->count('category.id') }}
                        </caption>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @if ($data->count('category.id') == 0)
                                <tr>
                                    <td colspan="8"
                                        class="justify-content-center align-items-center text-center text-muted">Belum ada
                                        data nya.</td>
                                </tr>
                            @else
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <a href="" class="btn btn-sm rounded-pill btn-primary"><i
                                                    class='bx bx-list-ul'></i></a>
                                            <a href="" class="btn btn-sm rounded-pill btn-danger"><i
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
            <div class="modal fade" id="categorymodal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Tambah Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('admin.createcategory') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="nameSmall" class="form-label">Nama Category</label>
                                        <input type="text" name="name" id="nameSmall" class="form-control"
                                            placeholder="Masukan Nama" />
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" class="btn btn-primary">Simpan Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->


        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
@endsection
