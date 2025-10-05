@extends('layout.app')

@section('content')
<h3>Edit Mata Kuliah</h3>

<form action="{{ route('mata_kuliah.update', $mata_kuliah) }}" method="POST">
  @csrf
  @method('PUT')

  <div class="mb-3">
    <label>Nama Mata Kuliah</label>
    <input type="text" name="nama" value="{{ $mata_kuliah->nama }}" class="form-control" required>
  </div>

  <div class="mb-3">
    <label>SKS</label>
    <input type="number" name="sks" value="{{ $mata_kuliah->sks }}" class="form-control" min="1" max="6" required>
  </div>

  <div class="mb-3">
    <label>Dosen Pengampu</label>
    <select name="dosen_id" class="form-select" required>
      @foreach($dosens as $d)
        <option value="{{ $d->id }}" {{ $mata_kuliah->dosen_id == $d->id ? 'selected' : '' }}>{{ $d->nama }}</option>
      @endforeach
    </select>
  </div>

  <button class="btn btn-primary">Update</button>
  <a href="{{ route('mata_kuliah.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
