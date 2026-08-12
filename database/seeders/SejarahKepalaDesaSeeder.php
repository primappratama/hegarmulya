<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SejarahKepalaDesaSeeder extends Seeder
{
    /**
     * Sumber: Database_Desa_Hegarmulya_.docx - riwayat 9 kali pergantian
     * pemimpin sampai dengan tahun 2016 (Rosidin, S.Hut masih menjabat
     * hingga sekarang sehingga periode_selesai dibiarkan NULL).
     */
    public function run(): void
    {
        $now = now();

        DB::table('sejarah_kepala_desa')->insert([
            [
                'periode_mulai'    => 1980,
                'periode_selesai'  => 1992,
                'nama_kepala_desa' => 'H. Hamda Djajuli',
                'status'           => 'definitif',
                'pencapaian'       => 'Memegang kendali kekuasaan Desa Hegarmulya terlama, yakni 12 tahun. '
                    . 'Diawali sebagai Pejabat Kepala Desa sebelum resmi menjadi Kepala Desa definitif 4 tahun kemudian.',
                'created_at'       => $now,
                'updated_at'       => $now,
            ],
            [
                'periode_mulai'    => 1993,
                'periode_selesai'  => 1994,
                'nama_kepala_desa' => 'Darkim',
                'status'           => 'pejabat',
                'pencapaian'       => null,
                'created_at'       => $now,
                'updated_at'       => $now,
            ],
            [
                'periode_mulai'    => 1994,
                'periode_selesai'  => 2000,
                'nama_kepala_desa' => 'Padli',
                'status'           => 'definitif',
                'pencapaian'       => null,
                'created_at'       => $now,
                'updated_at'       => $now,
            ],
            [
                'periode_mulai'    => 2000,
                'periode_selesai'  => 2001,
                'nama_kepala_desa' => 'Subar',
                'status'           => 'pejabat',
                'pencapaian'       => null,
                'created_at'       => $now,
                'updated_at'       => $now,
            ],
            [
                'periode_mulai'    => 2001,
                'periode_selesai'  => 2006,
                'nama_kepala_desa' => 'Yusup Ambari, S.Ag',
                'status'           => 'definitif',
                'pencapaian'       => null,
                'created_at'       => $now,
                'updated_at'       => $now,
            ],
            [
                'periode_mulai'    => 2006,
                'periode_selesai'  => 2007,
                'nama_kepala_desa' => 'Dadang Ruswandi',
                'status'           => 'pejabat',
                'pencapaian'       => null,
                'created_at'       => $now,
                'updated_at'       => $now,
            ],
            [
                'periode_mulai'    => 2007,
                'periode_selesai'  => 2012,
                'nama_kepala_desa' => 'Saepudin',
                'status'           => 'definitif',
                'pencapaian'       => null,
                'created_at'       => $now,
                'updated_at'       => $now,
            ],
            [
                'periode_mulai'    => 2012,
                'periode_selesai'  => 2013,
                'nama_kepala_desa' => 'Saepudin',
                'status'           => 'pejabat',
                'pencapaian'       => null,
                'created_at'       => $now,
                'updated_at'       => $now,
            ],
            [
                'periode_mulai'    => 2013,
                'periode_selesai'  => null, // masih menjabat hingga sekarang
                'nama_kepala_desa' => 'Rosidin, S.Hut',
                'status'           => 'definitif',
                'pencapaian'       => null,
                'created_at'       => $now,
                'updated_at'       => $now,
            ],
        ]);
    }
}