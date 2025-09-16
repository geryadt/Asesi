@extends('layouts.app')
@section('content')
<h2 class="mt-4">Kategori Surat &gt;&gt; Tambah</h2>
<form method="POST" action="{{ route('categories.store') }}">
    @csrf
    <div class="mb-3">
        <label>Nama Kategori</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Judul/Keterangan</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">&lt;&lt; Kembali</a>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
