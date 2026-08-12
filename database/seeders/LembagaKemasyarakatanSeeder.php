<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LembagaKemasyarakatanSeeder extends Seeder
{
    /**
     * Sumber: PROFIL_DESA_HEGARMULYA_2024.docx
     * Nomor SK tidak disimpan (sesuai kesepakatan). `tahun` dibiarkan
     * NULL karena dokumen tidak menyebutkan satu tahun data yang
     * eksplisit (SK tiap lembaga tersebar tahun 2013-2016).
     */
    public function run(): void
    {
        $now = now();

        DB::table('lembaga_kemasyarakatan')->insert([
            ['tahun' => null, 'nama_lembaga' => 'BPD', 'jumlah_pengurus' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['tahun' => null, 'nama_lembaga' => 'RT', 'jumlah_pengurus' => 22, 'created_at' => $now, 'updated_at' => $now],
            ['tahun' => null, 'nama_lembaga' => 'RW', 'jumlah_pengurus' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['tahun' => null, 'nama_lembaga' => 'TP. PKK', 'jumlah_pengurus' => 25, 'created_at' => $now, 'updated_at' => $now],
            ['tahun' => null, 'nama_lembaga' => 'LPM Desa', 'jumlah_pengurus' => 10, 'created_at' => $now, 'updated_at' => $now],
            ['tahun' => null, 'nama_lembaga' => 'Karang Taruna', 'jumlah_pengurus' => 10, 'created_at' => $now, 'updated_at' => $now],
            ['tahun' => null, 'nama_lembaga' => 'MUI Desa', 'jumlah_pengurus' => 8, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}