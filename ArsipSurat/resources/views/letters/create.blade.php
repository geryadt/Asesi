@extends('layouts.app')
@section('content')
<h2 class="mt-4">Arsip Surat &gt;&gt; Unggah</h2>
<form method="POST" enctype="multipart/form-data" action="{{ route('letters.store') }}">
    @csrf
    <div class="mb-3">
        <label>Nomor Surat</label>
        <input type="text" name="number" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Kategori</label>
        <select name="category_id" class="form-control" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Judul</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>File Surat (PDF)</label>
        <input type="file" name="file" class="form-control" accept="application/pdf" required>
    </div>
    <a href="{{ route('letters.index') }}" class="btn btn-secondary">&lt;&lt; Kembali</a>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
