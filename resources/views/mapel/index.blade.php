@extends('layouts.main')
@section('title', 'Data Mata Pelajaran')
@section('content')
<div class="d-flex justify-content-between mb-3"><h1 class="h3">Data Mata Pelajaran</h1><a class="btn btn-primary" href="{{ route('mapel.create') }}">Tambah Mata Pelajaran</a></div>
<div class="card shadow"><div class="card-body table-responsive"><table class="table table-bordered"><thead><tr><th>Kode</th><th>Nama Mata Pelajaran</th><th>KKM</th><th>Aksi</th></tr></thead><tbody>@forelse ($mapels as $item)<tr><td>{{ $item->kode_mapel }}</td><td>{{ $item->nama_mapel }}</td><td>{{ $item->kkm }}</td><td><a class="btn btn-sm btn-warning" href="{{ route('mapel.edit', $item) }}">Edit</a> <form class="d-inline" method="POST" action="{{ route('mapel.destroy', $item) }}" onsubmit="return confirm('Hapus mata pelajaran ini?')">@csrf @method('DELETE')<button class="btn btn-sm btn-danger">Hapus</button></form></td></tr>@empty<tr><td colspan="4" class="text-center">Belum ada data mata pelajaran.</td></tr>@endforelse</tbody></table>{{ $mapels->links() }}</div></div>
@endsection
