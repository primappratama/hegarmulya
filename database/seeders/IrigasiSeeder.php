<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IrigasiSeeder extends Seeder
{
    /**
     * Sumber: Database_Desa_Hegarmulya_.docx - daftar irigasi per dusun.
     * `jumlah` = banyaknya titik/saluran irigasi yang disebutkan per dusun.
     * `kondisi` diambil dari narasi umum dokumen (irigasi minim, hanya
     * maksimal saat musim hujan).
     */
    public function run(): void
    {
        $now = now();
        $kondisiUmum = 'Minim, hanya maksimal saat musim hujan; tidak ada air saat musim kemarau';

        DB::table('irigasi')->insert([
            [
                'jenis_pengairan' => 'Irigasi Dusun 1',
                'jumlah'          => 6,
                'kondisi'         => $kondisiUmum,
                'keterangan'      => 'Curug Cijengkol, Muara Cijengkol, Talun, Kokocoran 1, Kokocoran 2, Kokocoran 3',
                'created_at'      => $now,
                'updated_at'      => $now,
            ],
            [
                'jenis_pengairan' => 'Irigasi Dusun 2',
                'jumlah'          => 2,
                'kondisi'         => $kondisiUmum,
                'keterangan'      => 'Cipondok, Citerekel',
                'created_at'      => $now,
                'updated_at'      => $now,
            ],
            [
                'jenis_pengairan' => 'Irigasi Dusun 3',
                'jumlah'          => 2,
                'kondisi'         => $kondisiUmum,
                'keterangan'      => 'Cikadu, Sampih',
                'created_at'      => $now,
                'updated_at'      => $now,
            ],
            [
                'jenis_pengairan' => 'Irigasi Dusun 4',
                'jumlah'          => 4,
                'kondisi'         => $kondisiUmum,
                'keterangan'      => 'Cikidang 1, Cikidang 2, Cibitung, Cikoneng',
                'created_at'      => $now,
                'updated_at'      => $now,
            ],
        ]);
    }
}