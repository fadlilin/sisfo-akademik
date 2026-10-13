@extends('layouts.main')
@section('title', 'Data Siswa')
@section('content')
<div class="d-flex justify-content-between mb-3"><h1 class="h3">Data Siswa</h1><a class="btn btn-primary" href="{{ route('siswa.create') }}">Tambah Siswa</a></div>
<div class="card shadow"><div class="card-body table-responsive"><table class="table table-bordered"><thead><tr><th>NIS</th><th>Nama</th><th>Kelas</th><th>Jenis Kelamin</th><th>No. HP</th><th>Alamat</th><th>Aksi</th></tr></thead><tbody>
@forelse ($siswas as $item)<tr><td>{{ $item->nis }}</td><td>{{ $item->nama }}</td><td>{{ $item->kelas->nama_kelas ?? '-' }}</td><td>{{ $item->jenis_kelamin }}</td><td>{{ $item->no_hp ?? '-' }}</td><td>{{ $item->alamat ?? '-' }}</td><td class="text-nowrap"><a class="btn btn-sm btn-info" href="{{ route('siswa.show', $item) }}">Detail</a> <a class="btn btn-sm btn-warning" href="{{ route('siswa.edit', $item) }}">Edit</a> <form class="d-inline" method="POST" action="{{ route('siswa.destroy', $item) }}" onsubmit="return confirm('Hapus siswa ini?')">@csrf @method('DELETE')<button class="btn btn-sm btn-danger">Hapus</button></form></td></tr>
@empty<tr><td colspan="7" class="text-center">Belum ada data siswa.</td></tr>@endforelse</tbody></table>{{ $siswas->links() }}</div></div>
@endsection
