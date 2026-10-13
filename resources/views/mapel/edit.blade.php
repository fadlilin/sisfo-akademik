@extends('layouts.main')
@section('title', 'Edit Mata Pelajaran')
@section('content')
<div class="card shadow"><div class="card-header">Edit Mata Pelajaran</div><div class="card-body"><form method="POST" action="{{ route('mapel.update', $mapel) }}">@csrf @method('PUT')
@foreach (['kode_mapel' => 'Kode Mata Pelajaran', 'nama_mapel' => 'Nama Mata Pelajaran', 'kkm' => 'KKM'] as $field => $label)<div class="form-group"><label for="{{ $field }}">{{ $label }}</label><input class="form-control @error($field) is-invalid @enderror" id="{{ $field }}" name="{{ $field }}" value="{{ old($field, $mapel->$field) }}" @if($field === 'kkm') type="number" min="0" max="100" @endif required>@error($field)<div class="invalid-feedback">{{ $message }}</div>@enderror</div>@endforeach
<button class="btn btn-primary">Simpan Perubahan</button> <a class="btn btn-secondary" href="{{ route('mapel.index') }}">Batal</a></form></div></div>
@endsection
