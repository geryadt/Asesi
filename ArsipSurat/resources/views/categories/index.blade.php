@extends('layouts.app')
@section('content')
<h2 class="mt-4">Kategori Surat</h2>
<p>Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat.<br>Klik "Tambah" pada kolom aksi untuk menambahkan kategori baru.</p>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID Kategori</th>
            <th>Nama Kategori</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td>
                <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</button>
                </form>
                <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('categories.create') }}" class="btn btn-success">[ + ] Tambah Kategori Baru...</a>
@endsection
