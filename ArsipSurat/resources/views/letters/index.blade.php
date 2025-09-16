@extends('layouts.app')
@section('content')
<h2 class="mt-4">Arsip Surat</h2>
<p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.<br>Klik "Lihat" pada kolom aksi untuk menampilkan surat.</p>
<form method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="search" value="{{ $search }}">
        <button class="btn btn-primary" type="submit">Cari!</button>
    </div>
</form>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nomor Surat</th>
            <th>Kategori</th>
            <th>Judul</th>
            <th>Waktu Pengarsipan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($letters as $letter)
        <tr>
            <td>{{ $letter->number }}</td>
            <td>{{ $letter->category->name }}</td>
            <td>{{ $letter->title }}</td>
            <td>{{ $letter->archived_at }}</td>
            <td>
                <form action="{{ route('letters.destroy', $letter) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus arsip surat ini?')">Hapus</button>
                </form>
                <a href="{{ route('letters.download', $letter) }}" class="btn btn-warning">Unduh</a>
                <a href="{{ route('letters.show', $letter) }}" class="btn btn-primary">Lihat &gt;&gt;</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('letters.create') }}" class="btn btn-success">Arsipkan Surat..</a>
@endsection
