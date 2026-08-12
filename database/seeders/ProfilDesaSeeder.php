<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilDesaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('profil_desas')->insert([
            'nama_desa'              => 'Hegarmulya',
            'kecamatan'              => 'Cidadap',
            'kabupaten'              => 'Kabupaten Sukabumi',
            'provinsi'               => 'Jawa Barat',
            'alamat_kantor'          => null,
            'email'                  => null,
            'luas_wilayah_ha'        => null,
            'ketinggian_min_m'       => null,
            'ketinggian_max_m'       => null,
            'curah_hujan'            => '1000 - 2000 Mm/Thn',
            'topografi'              => 'Berbukit-bukit',
            'jenis_tanah'            => 'Humus, Alupial, Latosol, Kapur, dan Lempung',
            'suhu_min'               => 27.00,
            'suhu_max'               => 32.00,
            'jarak_kecamatan_km'     => null,
            'jarak_kabupaten_km'     => null,
            'jarak_provinsi_km'      => null,
            'jarak_ibukota_km'       => null,
            'latitude'               => null,
            'longitude'              => null,
            'sejarah_singkat'        => "Nama Hegarmulya lahir dari sebuah keyakinan para pemrakarsa desa bahwa nama adalah doa. "
                . "Para pemrakarsa desa berharap dengan nama ini kelak warga desa memiliki kehidupan yang cerah (Hegar) "
                . "dengan warga masyarakat yang berhati mulia (Mulya).\n\n"
                . "Benih-benih harapan mulai disemai pada tahun 1980, ketika Desa Hegarmulya resmi menjadi desa pemekaran "
                . "dari Desa Cikarang. H. Hamda Djajuli ditetapkan sebagai Pejabat Kepala Desa, dan 4 tahun kemudian resmi "
                . "menjadi Kepala Desa definitif hingga tahun 1992. H. Hamda Djajuli tercatat sebagai pemegang kendali "
                . "kekuasaan Desa Hegarmulya terlama, yakni 12 tahun.\n\n"
                . "Hingga 2016, Desa Hegarmulya telah mengalami 9 kali pergantian pemimpin. Kondisi geografis yang "
                . "berbukit-bukit dan SDM yang masih rendah menjadi tantangan bagi desa untuk lepas dari predikat desa "
                . "tertinggal dan menyongsong desa yang mandiri dan madani.",
            'visi_misi'              => null,
            'kondisi_tempat_tinggal' => "Jumlah rumah yang tersebar di seluruh dusun sebanyak 2.307 rumah. Hampir seluruh rumah memiliki pekarangan, kecuali sekitar 40 rumah di wilayah Rawaece yang tidak memiliki pekarangan karena kepadatan penduduk lebih tinggi.\n\n"
                . "Rumah yang ditempati masyarakat pada umumnya merupakan rumah milik sendiri. Fasilitas sanitasi (toilet) sudah tersedia di sebagian besar rumah, meski sebagian warga di wilayah dengan keterbatasan mata air masih menggunakan toilet umum. "
                . "Kebutuhan air bersih dipenuhi melalui jaringan perpipaan dari sumber mata air. Akses listrik dari PLN telah menjangkau seluruh wilayah desa.",
            'created_at'             => now(),
            'updated_at'             => now(),
        ]);
    }
}