<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $nilais = Nilai::with(['siswa.kelas', 'mapel'])->latest()->paginate(15);

        return view('nilai.index', compact('nilais'));
    }

    public function create()
    {
        $siswas = Siswa::orderBy('nama')->get();
        $mapels = Mapel::orderBy('nama_mapel')->get();

        return view('nilai.create', compact('siswas', 'mapels'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'siswa_id' => ['required', 'exists:siswas,id'],
            'mapel_id' => ['required', 'exists:mapels,id', 'unique:nilais,mapel_id,NULL,id,siswa_id,'.$request->input('siswa_id')],
            'nilai_tugas' => ['required', 'numeric', 'between:0,100'],
            'nilai_uts' => ['required', 'numeric', 'between:0,100'],
            'nilai_uas' => ['required', 'numeric', 'between:0,100'],
        ]);

        $mapel = Mapel::findOrFail($validated['mapel_id']);
        $nilaiAkhir = ($validated['nilai_tugas'] * 0.3) + ($validated['nilai_uts'] * 0.3) + ($validated['nilai_uas'] * 0.4);
        $validated['nilai_akhir'] = round($nilaiAkhir, 2);
        $validated['keterangan'] = $nilaiAkhir >= $mapel->kkm ? 'Lulus' : 'Tidak Lulus';

        Nilai::create($validated);

        return redirect()->route('nilai.index')->with('success', 'Nilai berhasil ditambahkan.');
    }

    public function edit(Nilai $nilai)
    {
        $siswas = Siswa::orderBy('nama')->get();
        $mapels = Mapel::orderBy('nama_mapel')->get();

        return view('nilai.edit', compact('nilai', 'siswas', 'mapels'));
    }

    public function update(Request $request, Nilai $nilai)
    {
        $validated = $request->validate([
            'siswa_id' => ['required', 'exists:siswas,id'],
            'mapel_id' => ['required', 'exists:mapels,id', 'unique:nilais,mapel_id,'.$nilai->id.',id,siswa_id,'.$request->input('siswa_id')],
            'nilai_tugas' => ['required', 'numeric', 'between:0,100'],
            'nilai_uts' => ['required', 'numeric', 'between:0,100'],
            'nilai_uas' => ['required', 'numeric', 'between:0,100'],
        ]);

        $mapel = Mapel::findOrFail($validated['mapel_id']);
        $nilaiAkhir = ($validated['nilai_tugas'] * 0.3) + ($validated['nilai_uts'] * 0.3) + ($validated['nilai_uas'] * 0.4);
        $validated['nilai_akhir'] = round($nilaiAkhir, 2);
        $validated['keterangan'] = $nilaiAkhir >= $mapel->kkm ? 'Lulus' : 'Tidak Lulus';

        $nilai->update($validated);

        return redirect()->route('nilai.index')->with('success', 'Nilai berhasil diperbarui.');
    }

    public function destroy(Nilai $nilai)
    {
        $nilai->delete();

        return redirect()->route('nilai.index')->with('success', 'Nilai berhasil dihapus.');
    }
}
