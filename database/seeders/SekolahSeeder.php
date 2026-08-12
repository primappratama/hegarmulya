<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SekolahSeeder extends Seeder
{
    /**
     * Sumber: PROFIL_DESA_HEGARMULYA_2024.docx
     * Hanya nama, jenjang, status, dan lokasi dusun yang diinput.
     * Jumlah murid & guru TIDAK dimasukkan (belum ada pendataan terbaru).
     */
    public function run(): void
    {
        $now = now();
        $dusun = DB::table('dusun')->pluck('id', 'nama_dusun'); // 'Dusun 1' s.d. 'Dusun 4'

        $data = [
            ['PAUD Melati', 'PAUD', 'swasta', 'Dusun 1'],
            ['PAUD Mawar', 'PAUD', 'swasta', 'Dusun 2'],
            ['PAUD Sukaraksa', 'PAUD', 'swasta', 'Dusun 2'],
            ['PAUD Anggrek', 'PAUD', 'swasta', 'Dusun 4'],
            ['PAUD Teratai', 'PAUD', 'swasta', 'Dusun 4'],
            ['PAUD Darmajaya', 'PAUD', 'swasta', 'Dusun 3'],
            ['SDN Sukaraksa', 'SD/MI/PA', 'negeri', 'Dusun 2'],
            ['MI Hegarmulya', 'SD/MI/PA', 'swasta', 'Dusun 4'],
            ['MD Sukaraksa', 'MD', 'swasta', 'Dusun 2'],
            ['MD Rawaece', 'MD', 'swasta', 'Dusun 1'],
            ['Paket A Babakan', 'SD/MI/PA', 'negeri', 'Dusun 1'],
            ['SMP Sukaraksa', 'SMP/MTs/PB', 'negeri', 'Dusun 2'],
            ['MTs Cikidang', 'SMP/MTs/PB', 'swasta', 'Dusun 4'],
            ['Paket B Rawaece', 'SMP/MTs/PB', 'negeri', 'Dusun 1'],
            ['Paket B Cikidang', 'SMP/MTs/PB', 'negeri', 'Dusun 4'],
            ['Paket C Sukaraksa', 'SMA/MA/PC', 'negeri', 'Dusun 2'],
            ['Pontren Cisalopa', 'Umum', 'swasta', 'Dusun 1'],
            ['Pontren AlSadar', 'Umum', 'swasta', 'Dusun 3'],
            ['Pontren Cibitung', 'Umum', 'swasta', 'Dusun 4'],
        ];

        $rows = array_map(function ($item) use ($dusun, $now) {
            [$nama, $jenjang, $status, $namaDusun] = $item;
            return [
                'nama_sekolah' => $nama,
                'jenjang' => $jenjang,
                'status' => $status,
                'dusun_id' => $dusun[$namaDusun] ?? null,
                'jumlah_murid' => null,
                'jumlah_guru' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }, $data);

        DB::table('sekolah')->insert($rows);
    }
}