@extends('layout.app')

@section('content')
<h3>Tambah Mata Kuliah</h3>

<form action="{{ route('mata_kuliah.store') }}" method="POST">
  @csrf
  <div class="mb-3">
    <label>Nama Mata Kuliah</label>
    <input type="text" name="nama" class="form-control" required>
  </div>

  <div class="mb-3">
    <label>SKS</label>
    <input type="number" name="sks" class="form-control" min="1" max="6" required>
  </div>

  <div class="mb-3">
    <label>Dosen Pengampu</label>
    <select name="dosen_id" class="form-select" required>
      <option value="">-- Pilih Dosen --</option>
      @foreach($dosens as $d)
        <option value="{{ $d->id }}">{{ $d->nama }}</option>
      @endforeach
    </select>
  </div>

  <button class="btn btn-success">Simpan</button>
  <a href="{{ route('mata_kuliah.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
