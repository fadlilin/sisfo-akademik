@extends('layouts.main')
@section('title', 'Data Guru')
@section('content')
<div class="d-flex justify-content-between mb-3"><h1 class="h3">Data Guru</h1><a class="btn btn-primary" href="{{ route('guru.create') }}">Tambah Guru</a></div>
<div class="card shadow"><div class="card-body table-responsive"><table class="table table-bordered"><thead><tr><th>NIP</th><th>Nama</th><th>Jenis Kelamin</th><th>Email</th><th>No. HP</th><th>Alamat</th><th>Aksi</th></tr></thead><tbody>@forelse ($gurus as $item)<tr><td>{{ $item->nip }}</td><td>{{ $item->nama }}</td><td>{{ $item->jenis_kelamin }}</td><td>{{ $item->email ?? '-' }}</td><td>{{ $item->no_hp ?? '-' }}</td><td>{{ $item->alamat ?? '-' }}</td><td class="text-nowrap"><a class="btn btn-sm btn-warning" href="{{ route('guru.edit', $item) }}">Edit</a> <form class="d-inline" method="POST" action="{{ route('guru.destroy', $item) }}" onsubmit="return confirm('Hapus guru ini?')">@csrf @method('DELETE')<button class="btn btn-sm btn-danger">Hapus</button></form></td></tr>@empty<tr><td colspan="7" class="text-center">Belum ada data guru.</td></tr>@endforelse</tbody></table>{{ $gurus->links() }}</div></div>
@endsection
