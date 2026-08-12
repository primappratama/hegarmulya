<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BatasWilayahSeeder extends Seeder
{
    /**
     * Sumber: PROFIL_DESA_HEGARMULYA_2024.docx
     */
    public function run(): void
    {
        $now = now();

        DB::table('batas_wilayah')->insert([
            ['arah' => 'utara', 'keterangan' => 'Berbatasan dengan Desa Mekartani dan Desa Ciakarang', 'created_at' => $now, 'updated_at' => $now],
            ['arah' => 'timur', 'keterangan' => 'Berbatasan dengan Desa Mekartani dan Kabupaten Cianjur', 'created_at' => $now, 'updated_at' => $now],
            ['arah' => 'selatan', 'keterangan' => 'Berbatasan dengan Desa Tenjolaut dan Kabupaten Cianjur', 'created_at' => $now, 'updated_at' => $now],
            ['arah' => 'barat', 'keterangan' => 'Berbatasan dengan Desa Cikarang', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}