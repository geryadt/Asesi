@extends('layouts.app')
@section('content')
<h2 class="mt-4">Arsip Surat &gt;&gt; Lihat</h2>
<p>Nomor: {{ $letter->number }}<br>
Kategori: {{ $letter->category->name }}<br>
Judul: {{ $letter->title }}<br>
Waktu Unggah: {{ $letter->archived_at }}</p>
<iframe src="{{ asset('storage/' . $letter->file_path) }}" width="100%" height="500px"></iframe>
<a href="{{ route('letters.index') }}" class="btn btn-secondary">&lt;&lt; Kembali</a>
<a href="{{ route('letters.download', $letter) }}" class="btn btn-warning">Unduh</a>
@endsection
