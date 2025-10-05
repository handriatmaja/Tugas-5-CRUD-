@extends('layout.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Tambah Dosen</h2>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <h4 class="alert-heading">Terdapat Kesalahan!</h4>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('dosen.store') }}">
        @csrf
        
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Dosen</label>
            <input type="text" name="nama" id="nama" 
                   class="form-control" 
                   value="{{ old('nama') }}">
            </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email Dosen (@gmail.com)</label>
            <input type="email" name="email" id="email" 
                   class="form-control" 
                   value="{{ old('email') }}">
        </div>

        <button type="submit" class="btn btn-success">Simpan Dosen</button>
    </form>
</div>
@endsection