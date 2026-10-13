@extends('layouts.main')
@section('title', 'Tambah Data Siswa')
@section('content')
<div class="card shadow"><div class="card-header">Tambah Data Siswa</div><div class="card-body"><form method="POST" action="{{ route('siswa.store') }}">@csrf
@foreach (['nis' => 'NIS', 'nama' => 'Nama Lengkap', 'no_hp' => 'No. HP', 'alamat' => 'Alamat'] as $field => $label)<div class="form-group"><label for="{{ $field }}">{{ $label }}</label><input class="form-control @error($field) is-invalid @enderror" id="{{ $field }}" name="{{ $field }}" value="{{ old($field) }}" @required($field !== 'no_hp' && $field !== 'alamat')>@error($field)<div class="invalid-feedback">{{ $message }}</div>@enderror</div>@endforeach
<div class="form-group"><label for="kelas_id">Kelas</label><select class="form-control @error('kelas_id') is-invalid @enderror" id="kelas_id" name="kelas_id" required><option value="">Pilih kelas</option>@foreach ($kelas as $item)<option value="{{ $item->id }}" @selected(old('kelas_id') == $item->id)>{{ $item->nama_kelas }}</option>@endforeach</select>@error('kelas_id')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
<div class="form-group"><label for="jenis_kelamin">Jenis Kelamin</label><select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" required><option value="">Pilih</option><option value="L" @selected(old('jenis_kelamin') === 'L')>Laki-laki</option><option value="P" @selected(old('jenis_kelamin') === 'P')>Perempuan</option></select>@error('jenis_kelamin')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
<button class="btn btn-primary">Simpan</button> <a class="btn btn-secondary" href="{{ route('siswa.index') }}">Batal</a></form></div></div>
@endsection
