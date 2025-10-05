@extends('layout.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h3>Daftar Mata Kuliah</h3>
  <a href="{{ route('mata_kuliah.create') }}" class="btn btn-primary">Tambah Mata Kuliah</a>
</div>

<form method="GET" class="mb-3">
  <div class="d-flex gap-2">
    <input type="text" name="q" value="{{ $q }}" placeholder="Cari mata kuliah..." class="form-control w-25">
    <select name="dosen_id" class="form-select w-25">
      <option value="">-- Semua Dosen --</option>
      @foreach($dosens as $d)
        <option value="{{ $d->id }}" {{ $dosen_id == $d->id ? 'selected' : '' }}>{{ $d->nama }}</option>
      @endforeach
    </select>
    <button class="btn btn-secondary">Filter</button>
  </div>
</form>

<table class="table table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>SKS</th>
      <th>Dosen Pengampu</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($items as $i => $mk)
    <tr>
      <td>{{ $items->firstItem() + $i }}</td>
      <td>{{ $mk->nama }}</td>
      <td>{{ $mk->sks }}</td>
      <td>{{ $mk->dosen->nama }}</td>
      <td>
        <a href="{{ route('mata_kuliah.edit', $mk) }}" class="btn btn-warning btn-sm">Edit</a>
        <form action="{{ route('mata_kuliah.destroy', $mk) }}" method="POST" class="d-inline">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

{{ $items->links('pagination::bootstrap-5') }}
@endsection
