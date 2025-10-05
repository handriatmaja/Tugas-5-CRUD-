@extends('layout.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Daftar Dosen</h1>
    
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <a href="{{ route('dosen.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Dosen
        </a>
    </div>

    <form method="GET" action="{{ route('dosen.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Cari dosen berdasarkan nama atau email..." value="{{ $q }}">
            <button class="btn btn-outline-secondary" type="submit">Cari</button>
            @if($q)
                <a href="{{ route('dosen.index') }}" class="btn btn-outline-danger">Reset</a>
            @endif
        </div>
    </form>
    
    @if (session('ok'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('ok') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $dosen)
            <tr>
                {{-- Hitung nomor urut dengan memperhitungkan pagination --}}
                <td>{{ ($items->currentPage() - 1) * $items->perPage() + $loop->iteration }}</td>
                <td>{{ $dosen->nama }}</td>
                <td>{{ $dosen->email }}</td>
                <td>
                    <a href="{{ route('dosen.edit', $dosen) }}" class="btn btn-sm btn-warning me-2">Edit</a>
                    
                    <form action="{{ route('dosen.destroy', $dosen) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus Dosen {{ $dosen->nama }}?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Tidak ada data dosen ditemukan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $items->links('pagination::bootstrap-5') }}
    </div>

    <div class="text-muted mt-3">
        Menampilkan {{ $items->firstItem() }} hingga {{ $items->lastItem() }} dari total {{ $items->total() }} hasil.
    </div>

</div>
@endsection
