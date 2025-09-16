@extends('layouts.app')
@section('content')
<h2 class="mt-4">Kategori Surat &gt;&gt; Edit</h2>
<form method="POST" action="{{ route('categories.update', $category) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Nama Kategori</label>
        <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
    </div>
    <div class="mb-3">
        <label>Judul/Keterangan</label>
        <textarea name="description" class="form-control">{{ $category->description }}</textarea>
    </div>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">&lt;&lt; Kembali</a>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
