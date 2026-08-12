<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
 
class SungaiSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();
        DB::table('sungai')->insert([
            ['nama_sungai' => 'Sungai Cijengkol', 'keterangan' => 'Melintasi Dusun Rawaecek dan Dusun Cijengkol.', 'created_at' => $now, 'updated_at' => $now],
            ['nama_sungai' => 'Sungai Cikidang', 'keterangan' => 'Melintasi Dusun Pasir Gambir dan Dusun Cibitung, bermuara di Sungai Cibuni.', 'created_at' => $now, 'updated_at' => $now],
            ['nama_sungai' => 'Sungai Cibuni', 'keterangan' => 'Berada di perbatasan Kabupaten Sukabumi dan Cianjur, bermuara di Pantai Karang Anyar.', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}