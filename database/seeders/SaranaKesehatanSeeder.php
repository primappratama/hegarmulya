<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaranaKesehatanSeeder extends Seeder
{
    /**
     * Sumber: PROFIL_DESA_HEGARMULYA_2024.docx, data tahun 2020.
     * Item ini awalnya ada di bagian "Tenaga Kesehatan" dokumen, tapi
     * dipindah ke sini karena sifatnya fasilitas/program, bukan personel.
     * POD (jumlah 0) tidak diinput.
     *
     * CATATAN: ADPUB bilang ada "file database terbaru" untuk sarana
     * kesehatan -- data ini sementara, ganti begitu file itu diterima.
     */
    public function run(): void
    {
        $now = now();
        $tahun = 2020;

        DB::table('sarana_kesehatan')->insert([
            ['jenis' => 'Posyandu', 'jumlah' => 6, 'tahun' => $tahun, 'created_at' => $now, 'updated_at' => $now],
            ['jenis' => 'Polindes', 'jumlah' => 1, 'tahun' => $tahun, 'created_at' => $now, 'updated_at' => $now],
            ['jenis' => 'Desa Siaga', 'jumlah' => 1, 'tahun' => $tahun, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}