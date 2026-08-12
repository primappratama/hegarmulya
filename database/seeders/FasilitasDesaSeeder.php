<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
 
class FasilitasDesaSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();
 
        $rows = [
            // Kelembagaan
            ['Kelembagaan', 'Kepala Dusun', 4, 'Orang'],
            ['Kelembagaan', 'Kantor Desa', 1, 'Buah'],
            ['Kelembagaan', 'Aparat Desa', 12, 'Orang'],
            ['Kelembagaan', 'BumDes', 1, 'Buah'],
            ['Kelembagaan', 'Koperasi', 1, 'Buah'],
            ['Kelembagaan', 'SPPG', 0, 'Buah'],
 
            // Layanan Pendidikan
            ['Pendidikan', 'PAUD', 6, 'Buah'],
            ['Pendidikan', 'SD Negeri', 1, 'Buah'],
            ['Pendidikan', 'MI', 1, 'Buah'],
            ['Pendidikan', 'MD', 2, 'Buah'],
            ['Pendidikan', 'Paket A', 1, 'Buah'],
            ['Pendidikan', 'SMP Negeri', 1, 'Buah'],
            ['Pendidikan', 'MTs', 1, 'Buah'],
            ['Pendidikan', 'Paket B', 2, 'Buah'],
            ['Pendidikan', 'Paket C', 1, 'Buah'],
            ['Pendidikan', 'PONPES', 3, 'Buah'],
 
            // Layanan Kesehatan
            ['Kesehatan', 'Klinik Umum', 0, 'Buah'],
            ['Kesehatan', 'Klinik Bersalin', 0, 'Buah'],
            ['Kesehatan', 'Puskesmas Pembantu', 1, 'Buah'],
            ['Kesehatan', 'Paraji', 2, 'Buah'],
            ['Kesehatan', 'Bidan', 4, 'Buah'],
            ['Kesehatan', 'Mantri', 1, 'Buah'],
            ['Kesehatan', 'Posyandu', 6, 'Buah'],
        ];
 
        $data = array_map(function ($r) use ($now) {
            return [
                'kategori' => $r[0], 'jenis' => $r[1], 'jumlah' => $r[2], 'satuan' => $r[3],
                'created_at' => $now, 'updated_at' => $now,
            ];
        }, $rows);
 
        DB::table('fasilitas_desa')->insert($data);
    }
}