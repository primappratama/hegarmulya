<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsahaEkonomiSeeder extends Seeder
{
    /**
     * Sumber: PROFIL_DESA_HEGARMULYA_2024.docx ("gunakan data seadanya").
     * Tahun tidak disebutkan -> NULL. Penggilingan Aci (jumlah 0) tidak diinput.
     */
    public function run(): void
    {
        $now = now();

        DB::table('usaha_ekonomi')->insert([
            ['jenis_usaha' => 'Toko/Warung', 'sub_jenis' => 'Warung Grosir', 'jumlah' => 4, 'tahun' => null, 'created_at' => $now, 'updated_at' => $now],
            ['jenis_usaha' => 'Toko/Warung', 'sub_jenis' => 'Warung Eceran', 'jumlah' => 32, 'tahun' => null, 'created_at' => $now, 'updated_at' => $now],
            ['jenis_usaha' => 'Toko/Warung', 'sub_jenis' => 'Warung Kelontongan', 'jumlah' => 10, 'tahun' => null, 'created_at' => $now, 'updated_at' => $now],
            ['jenis_usaha' => 'Penggilingan', 'sub_jenis' => 'Penggilingan Padi', 'jumlah' => 12, 'tahun' => null, 'created_at' => $now, 'updated_at' => $now],
            ['jenis_usaha' => 'Penggilingan', 'sub_jenis' => 'Penggilingan Beras Tepung', 'jumlah' => 4, 'tahun' => null, 'created_at' => $now, 'updated_at' => $now],
            ['jenis_usaha' => 'Penggilingan', 'sub_jenis' => 'Penggilingan Kelapa', 'jumlah' => 2, 'tahun' => null, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}