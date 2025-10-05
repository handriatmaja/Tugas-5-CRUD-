@extends('layout.app')

@section('content')
<h3>Edit Dosen</h3>

<form action="{{ route('dosen.update', $dosen) }}" method="POST">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label>Nama</label>
    <input type="text" name="nama" value="{{ $dosen->nama }}" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" value="{{ $dosen->email }}" class="form-control" required>
  </div>
  <button class="btn btn-primary">Update</button>
  <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
