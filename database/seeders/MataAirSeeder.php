<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
 
class MataAirSeeder extends Seeder
{
    /**
     * Asumsi mapping "Letak Mata Air" di dokumen (Dusun 1-4) mengikuti
     * urutan baris yang sama persis dengan DusunSeeder (Dusun 1, 2, 3, 4).
     * Jika nama dusun definitif sudah dikonfirmasi, cukup update nama_dusun
     * di tabel `dusun`, tidak perlu ubah seeder ini.
     */
    public function run(): void
    {
        $now = now();
 
        $dusunIds = DB::table('dusun')->orderBy('id')->pluck('id', 'nama_dusun');
 
        $data = [
            'Dusun 1' => ['Batu Patat', 'Rawa Buruy', 'Rawaece', 'Cisalak', 'Muara Jengkol', 'Situ Picung'],
            'Dusun 2' => ['Cilendi', 'Cisalada', 'Karamat', 'Cipondok', 'Cikadu', 'Ciherang Moyan'],
            'Dusun 3' => ['Babakan Jati', 'Cipongpok', 'Gambir', 'Ciseel', 'Cipulus', 'Cikaracak'],
            'Dusun 4' => ['Cisuren', 'Cikoneng', 'Tangkil', 'Cigombong', 'Cipancur'],
        ];
 
        $rows = [];
        foreach ($data as $namaDusun => $mataAirs) {
            $dusunId = $dusunIds[$namaDusun] ?? null;
            foreach ($mataAirs as $nama) {
                $rows[] = [
                    'dusun_id' => $dusunId,
                    'nama_mata_air' => $nama,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }
 
        DB::table('mata_air')->insert($rows);
    }
}