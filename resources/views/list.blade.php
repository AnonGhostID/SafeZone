@extends('layout.app')
@section('title', 'karyawan')
@section('content')
    <h1 class="h3 mb-2 text-gray-800">List User</h1>
    @if (session('pesan'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('pesan') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow mb-4">
        {{-- <div class="card-header py-3">
            <a href="{{ route('karyawan.insert') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a>
        </div> --}}
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>User</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($user as $item)
                            <tr class="text-center">
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->name }}</td>
                                <td> @if($item->role==0)
                                     user
                                    @else
                                admin
                            @endif</td>
                                <td>
                                    <a href="{{ route('list.edit', $item->id) }}" class="btn btn-warning btn-sm"><i
                                            class="fas fa-edit"></i> Edit</a>
                                    <a href="{{ route('list.delete', $item->id) }}" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah yakin menghapus data ini?')"><i
                                            class="fas fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
