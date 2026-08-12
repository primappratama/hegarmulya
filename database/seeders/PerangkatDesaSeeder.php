<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerangkatDesaSeeder extends Seeder
{
    /**
     * Sumber: PROFIL_DESA_HEGARMULYA_2024.docx
     * Data masih rekap jumlah per jabatan (bukan nama satu-satu), jadi
     * `nama` NULL dan jumlah orang disimpan di kolom `jumlah`. SK yang
     * tercatat untuk Kaur/Kadus/Kasi adalah SK bersama (1 SK untuk semua
     * orang di jabatan itu), bukan SK per-individu.
     */
    public function run(): void
    {
        $now = now();

        DB::table('perangkat_desa')->insert([
            ['nama' => null, 'jabatan' => 'Kepala Desa', 'jumlah' => 1, 'no_sk' => '141.1/Kep.862-BPMPD/2013', 'tanggal_sk' => '2013-07-25', 'created_at' => $now, 'updated_at' => $now],
            ['nama' => null, 'jabatan' => 'Sekretaris Desa', 'jumlah' => 1, 'no_sk' => '141.1/Kep 01./Pem.Hgm/I/2016', 'tanggal_sk' => '2016-01-06', 'created_at' => $now, 'updated_at' => $now],
            ['nama' => null, 'jabatan' => 'Kepala Urusan', 'jumlah' => 3, 'no_sk' => '141.1/Kep 01/Pem.Hgm/I/2016', 'tanggal_sk' => '2016-01-06', 'created_at' => $now, 'updated_at' => $now],
            ['nama' => null, 'jabatan' => 'Kepala Dusun', 'jumlah' => 4, 'no_sk' => '141.1/Kep 01/Pem.Hgm/I/2016', 'tanggal_sk' => '2016-01-06', 'created_at' => $now, 'updated_at' => $now],
            ['nama' => null, 'jabatan' => 'Kepala Seksi', 'jumlah' => 3, 'no_sk' => '141.1/Kep 01/Pem.Hgm/I/2016', 'tanggal_sk' => '2016-01-06', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}