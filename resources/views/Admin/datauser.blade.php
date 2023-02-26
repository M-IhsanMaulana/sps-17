@extends('admin')
@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="/admin">Home</a> /</span> Data User</h4>

        <!-- Bootstrap Table with Caption -->
        <div class="card">
            <h5 class="card-header">Data User</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <caption class="ms-4">
                        Total User : {{ $data->count('user.id') }}
                    </caption>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Foto</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $itemuser)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $itemuser->name }}</td>
                            <td>{{ $itemuser->username }}</td>
                            <td>{{ $itemuser->email }}</td>
                            @if($itemuser->role == 'admin')
                            <td><span class="badge bg-label-success me-1">{{ $itemuser->role }}</span></td>
                            @elseif($itemuser->role == 'petugas')
                            <td><span class="badge bg-label-warning me-1">{{ $itemuser->role }}</span></td>
                            @elseif ($itemuser->role == 'user')
                            <td><span class="badge bg-label-danger me-1">{{ $itemuser->role }}</span></td>
                            @endif
                            <td>
                                @if ($itemuser->foto == null)
                                <img src="{{ asset('storage/data-image/default-profile.png') }}" alt="Avatar" class="rounded-circle avatar" />
                                @else
                                <img src="{{ asset('storage/data-image' . $itemuser->foto) }}" alt="Avatar" class="rounded-circle avatar" />
                                @endif
                            </td>

                            <td>
                                <a href="" class="btn btn-sm rounded-pill btn-primary"><i class='bx bx-list-ul'></i></a>
                                <a href="" class="btn btn-sm rounded-pill btn-danger"><i class='bx bx-trash-alt'></i></a>
                            </td>
                        </tr>
                        @endforeach
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
