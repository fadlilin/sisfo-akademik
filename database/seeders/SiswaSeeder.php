<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kelas = Kelas::firstOrCreate(
            ['nama_kelas' => 'XI RPL 1'],
            [
                'tingkat' => 'XI',
                'jurusan' => 'Rekayasa Perangkat Lunak',
                'tahun_ajaran' => '2025/2026',
            ],
        );

        foreach ([
            ['nis' => '1001', 'nama' => 'Budi Santoso', 'jenis_kelamin' => 'L'],
            ['nis' => '1002', 'nama' => 'Siti Nurhaliza', 'jenis_kelamin' => 'P'],
        ] as $siswa) {
            Siswa::updateOrCreate(
                ['nis' => $siswa['nis']],
                [...$siswa, 'kelas_id' => $kelas->id],
            );
        }
    }
}
