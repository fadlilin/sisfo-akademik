@extends('layouts.main')

@section('title', 'Data Kelas')

@section('content')
    <div class="d-flex justify-content-between mb-3"><h1 class="h3">Data Kelas</h1><a class="btn btn-primary" href="{{ route('kelas.create') }}">Tambah Kelas</a></div>
    <div class="card shadow"><div class="card-body table-responsive"><table class="table table-bordered">
        <thead><tr><th>Nama Kelas</th><th>Tingkat</th><th>Jurusan</th><th>Tahun Ajaran</th><th>Jumlah Siswa</th><th>Aksi</th></tr></thead>
        <tbody>@forelse ($kelas as $item)<tr><td>{{ $item->nama_kelas }}</td><td>{{ $item->tingkat }}</td><td>{{ $item->jurusan }}</td><td>{{ $item->tahun_ajaran }}</td><td>{{ $item->siswas_count }}</td><td>
            <a class="btn btn-sm btn-warning" href="{{ route('kelas.edit', $item) }}">Edit</a>
            <form class="d-inline" method="POST" action="{{ route('kelas.destroy', $item) }}" onsubmit="return confirm('Hapus kelas ini?')">@csrf @method('DELETE')<button class="btn btn-sm btn-danger">Hapus</button></form>
        </td></tr>@empty<tr><td colspan="6" class="text-center">Belum ada data kelas.</td></tr>@endforelse</tbody>
    </table>{{ $kelas->links() }}</div></div>
@endsection
