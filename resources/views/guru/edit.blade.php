@extends('layouts.main')
@section('title', 'Edit Data Guru')
@section('content')
<div class="card shadow"><div class="card-header">Edit Data Guru</div><div class="card-body"><form method="POST" action="{{ route('guru.update', $guru) }}">@csrf @method('PUT')
@foreach (['nip' => 'NIP', 'nama' => 'Nama Lengkap', 'email' => 'Email', 'no_hp' => 'No. HP', 'alamat' => 'Alamat'] as $field => $label)<div class="form-group"><label for="{{ $field }}">{{ $label }}</label><input class="form-control @error($field) is-invalid @enderror" id="{{ $field }}" name="{{ $field }}" value="{{ old($field, $guru->$field) }}" @required(in_array($field, ['nip', 'nama']))>@error($field)<div class="invalid-feedback">{{ $message }}</div>@enderror</div>@endforeach
<div class="form-group"><label for="jenis_kelamin">Jenis Kelamin</label><select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" required><option value="">Pilih</option><option value="L" @selected(old('jenis_kelamin', $guru->jenis_kelamin) === 'L')>Laki-laki</option><option value="P" @selected(old('jenis_kelamin', $guru->jenis_kelamin) === 'P')>Perempuan</option></select>@error('jenis_kelamin')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
<button class="btn btn-primary">Simpan Perubahan</button> <a class="btn btn-secondary" href="{{ route('guru.index') }}">Batal</a></form></div></div>
@endsection
