<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatistikPendudukSeeder extends Seeder
{
    /**
     * Sumber: Database_Desa_Hegarmulya_.docx
     * Data observasi dilakukan 06 Juli - 16 Agustus 2026 -> tahun = 2026.
     * Baris "Jumlah/Total" tetap dimasukkan karena angka tersebut memang
     * eksplisit tertulis di dokumen (bukan hasil hitung sendiri).
     */
    public function run(): void
    {
        $tahun = 2026;
        $now   = now();

        // [kategori, sub_kategori, nilai]
        $rows = [
            // Jenis kelamin
            ['Jenis Kelamin', 'Laki-laki', 1303],
            ['Jenis Kelamin', 'Perempuan', 1305],
            ['Jenis Kelamin', 'Jumlah', 2608],

            // Kepala keluarga
            ['Kepala Keluarga', 'Jumlah', 1110],

            // Usia
            ['Usia', '00-05 Tahun', 191],
            ['Usia', '05-10 Tahun', 146],
            ['Usia', '10-15 Tahun', 139],
            ['Usia', '15-20 Tahun', 282],
            ['Usia', '20-30 Tahun', 274],
            ['Usia', '30-40 Tahun', 393],
            ['Usia', '40-50 Tahun', 431],
            ['Usia', '50-60 Tahun', 462],
            ['Usia', '60 Tahun ke atas', 386],
            ['Usia', 'Jumlah', 2608],

            // Kelompok tenaga kerja (usia)
            ['Kelompok Tenaga Kerja', '15-20 Tahun', 201],
            ['Kelompok Tenaga Kerja', '20-30 Tahun', 284],
            ['Kelompok Tenaga Kerja', '30-40 Tahun', 397],
            ['Kelompok Tenaga Kerja', '40-50 Tahun', 472],
            ['Kelompok Tenaga Kerja', '50 Tahun ke atas', 869],
            ['Kelompok Tenaga Kerja', 'Jumlah', 2608],

            // Pendidikan formal
            ['Pendidikan Formal', 'TK/TPA/PAUD', 191],
            ['Pendidikan Formal', 'SD/MI (Paket A)', 1299],
            ['Pendidikan Formal', 'SMP/SLTP (MTs dan Paket B)', 844],
            ['Pendidikan Formal', 'SMA/SLTA (MA dan Paket C)', 177],
            ['Pendidikan Formal', 'Akademi/D1-D3', 5],
            ['Pendidikan Formal', 'Sarjana/S-1', 97],
            ['Pendidikan Formal', 'Magister/S-2', 1],
            ['Pendidikan Formal', 'Doktor/S-3', 0],
            ['Pendidikan Formal', 'Jumlah', 2608],

            // Pendidikan non-formal
            ['Pendidikan Non-formal', 'PONPES', 64],
            ['Pendidikan Non-formal', 'Kursus', 30],
            ['Pendidikan Non-formal', 'Sekolah Luar Biasa', 2],
            ['Pendidikan Non-formal', 'Jumlah', 96],

            // Mata pencaharian
            ['Mata Pencaharian', 'PNS', 24],
            ['Mata Pencaharian', 'PNS POLRI', 0],
            ['Mata Pencaharian', 'PNS TNI', 0],
            ['Mata Pencaharian', 'Pensiunan PNS/POLRI/TNI', 11],
            ['Mata Pencaharian', 'Karyawan Swasta', 84],
            ['Mata Pencaharian', 'Wiraswasta', 310],
            ['Mata Pencaharian', 'Pedagang', 98],
            ['Mata Pencaharian', 'Petani', 1085],
            ['Mata Pencaharian', 'Buruh Tani', 968],
            ['Mata Pencaharian', 'Nelayan', 0],
            ['Mata Pencaharian', 'Jasa', 0],
            ['Mata Pencaharian', 'Jumlah', 2580],

            // Murid berdasarkan tingkatan
            ['Murid Berdasarkan Tingkatan', 'PAUD', 285],
            ['Murid Berdasarkan Tingkatan', 'SD/MI/Paket A', 238],
            ['Murid Berdasarkan Tingkatan', 'SMP/MTs/Paket B', 171],
            ['Murid Berdasarkan Tingkatan', 'SMA/Paket C', 60],
        ];

        $data = array_map(function ($row) use ($tahun, $now) {
            return [
                'tahun'        => $tahun,
                'kategori'     => $row[0],
                'sub_kategori' => $row[1],
                'nilai'        => $row[2],
                'satuan'       => 'orang',
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }, $rows);

        DB::table('statistik_penduduk')->insert($data);
    }
}