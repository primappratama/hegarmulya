<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DusunSeeder extends Seeder
{
    /**
     * Sumber: Database_Desa_Hegarmulya_.docx
     * Dokumen hanya menyebutkan 4 dusun sebagai "Dusun 1" - "Dusun 4"
     * (dipakai di tabel mata air & irigasi). Nama definitif dusun,
     * arah, luas_ha, dan jumlah_rt belum tercantum di dokumen -> NULL.
     * Kalau kamu tahu nama aslinya (mis. dari indikasi Rawaecek,
     * Cijengkol, Pasir Gambir, Cibitung), tinggal update nama_dusun-nya.
     */
    public function run(): void
    {
        $now = now();

        DB::table('dusun')->insert([
            ['nama_dusun' => 'Dusun 1', 'arah' => null, 'luas_ha' => null, 'jumlah_rt' => null, 'created_at' => $now, 'updated_at' => $now],
            ['nama_dusun' => 'Dusun 2', 'arah' => null, 'luas_ha' => null, 'jumlah_rt' => null, 'created_at' => $now, 'updated_at' => $now],
            ['nama_dusun' => 'Dusun 3', 'arah' => null, 'luas_ha' => null, 'jumlah_rt' => null, 'created_at' => $now, 'updated_at' => $now],
            ['nama_dusun' => 'Dusun 4', 'arah' => null, 'luas_ha' => null, 'jumlah_rt' => null, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}