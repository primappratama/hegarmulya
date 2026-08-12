<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
 
class WisataSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();
 
        $curug = ['Cijengkol', 'Cibuluh', 'Cianganata', 'Ciburahol', 'Cobogo', 'Doki', 'Ciangaraksa 1', 'Ciangaraksa 2', 'Ciangaraksa 3', 'Cikidang', 'Irateun'];
        $gua = ['Cianggaraksa', 'Doki', 'Cikatel', 'Cibogo', 'Angin', 'Piurang Legeut', 'Cikadu', 'Antang', 'Cileuni'];
 
        $rows = [];
        foreach ($curug as $nama) {
            $rows[] = ['nama_wisata' => "Curug {$nama}", 'kategori' => 'Curug', 'keterangan' => null, 'foto' => null, 'created_at' => $now, 'updated_at' => $now];
        }
        foreach ($gua as $nama) {
            $rows[] = ['nama_wisata' => "Gua {$nama}", 'kategori' => 'Gua', 'keterangan' => null, 'foto' => null, 'created_at' => $now, 'updated_at' => $now];
        }
 
        DB::table('wisata')->insert($rows);
    }
}