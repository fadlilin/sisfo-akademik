@extends('layouts.main')
@section('title', 'Edit Data Kelas')
@section('content')
<div class="card shadow"><div class="card-header">Edit Data Kelas</div><div class="card-body">
<form method="POST" action="{{ route('kelas.update', $kelas) }}">@csrf @method('PUT')
@foreach (['nama_kelas' => 'Nama Kelas', 'tingkat' => 'Tingkat', 'jurusan' => 'Jurusan', 'tahun_ajaran' => 'Tahun Ajaran'] as $field => $label)
<div class="form-group"><label for="{{ $field }}">{{ $label }}</label><input class="form-control @error($field) is-invalid @enderror" id="{{ $field }}" name="{{ $field }}" value="{{ old($field, $kelas->$field) }}" required>@error($field)<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
@endforeach
<button class="btn btn-primary">Simpan Perubahan</button> <a class="btn btn-secondary" href="{{ route('kelas.index') }}">Batal</a></form></div></div>
@endsection
