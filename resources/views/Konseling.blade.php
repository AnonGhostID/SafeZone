@extends('layout.app')
@section('title', 'Dashboard')
@section('content')
    <h1 class="h3 mb-2 text-gray-800">Bimbingan Konseling</h1>
    @if (session('pesan'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('pesan') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('konseling.insert') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Name</th>
                            <th>email</th>
                            <th>kelas</th>
                            <th>tanggal</th>
                            @if ($user->role == 1)
                                <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($konseling as $item)
                            <tr class="text-center">
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->kelas }}</td>
                                <td>{{ date('d-m-Y', strtotime($item->tanggal)) }}</td>
                                @if ($user->role == '1')
                                    <td>
                                        <a href="{{ route('konseling.edit', $item->id) }}" class="btn btn-warning btn-sm"><i
                                                class="fas fa-edit"></i> Edit</a>
                                        <a href="{{ route('konseling.delete', $item->id) }}" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah yakin menghapus data ini?')"><i
                                                class="fas fa-trash"></i> Hapus</a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
