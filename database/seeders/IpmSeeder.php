<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IpmSeeder extends Seeder
{
    /**
     * Sumber: PROFIL_DESA_HEGARMULYA_2024.docx, data tahun 2015.
     * Perlu dikonfirmasi apakah ada data yang lebih baru sebelum
     * ditampilkan ke publik.
     */
    public function run(): void
    {
        DB::table('ipm')->insert([
            'tahun' => 2015,
            'indeks_pendidikan' => 71.85,
            'indeks_kesehatan' => 60.55,
            'indeks_daya_beli' => 75.75,
            'realisasi_ipm' => 71.38,
            'target_ipm_kecamatan' => 80.00,
            'target_ipm_kabupaten' => 78.50,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}