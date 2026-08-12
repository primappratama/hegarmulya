<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TenagaKesehatanSeeder extends Seeder
{
    /**
     * Sumber: PROFIL_DESA_HEGARMULYA_2024.docx, data tahun 2020.
     * Hanya tenaga dengan jumlah > 0. Item fasilitas (Posyandu, Polindes,
     * dst) dipindah ke SaranaKesehatanSeeder, bukan di sini.
     */
    public function run(): void
    {
        $now = now();
        $tahun = 2020;

        DB::table('tenaga_kesehatan')->insert([
            ['tahun' => $tahun, 'jenis_tenaga' => 'Bidan', 'jumlah' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['tahun' => $tahun, 'jenis_tenaga' => 'Paramedis', 'jumlah' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['tahun' => $tahun, 'jenis_tenaga' => 'Dukun Bayi/Paraji', 'jumlah' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['tahun' => $tahun, 'jenis_tenaga' => 'Kader Kesehatan Aktif', 'jumlah' => 32, 'created_at' => $now, 'updated_at' => $now],
            ['tahun' => $tahun, 'jenis_tenaga' => 'Paraji Sunat', 'jumlah' => 1, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}