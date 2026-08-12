<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profil_desas', function (Blueprint $table) {
            $table->string('alamat_kantor')->nullable()->after('nama_desa');
            $table->string('email')->nullable()->after('alamat_kantor');
            $table->decimal('luas_wilayah_ha', 10, 2)->nullable()->after('provinsi');
            $table->decimal('ketinggian_min_m', 8, 2)->nullable()->after('luas_wilayah_ha');
            $table->decimal('ketinggian_max_m', 8, 2)->nullable()->after('ketinggian_min_m');
            $table->string('curah_hujan')->nullable()->after('ketinggian_max_m');
            $table->string('topografi')->nullable()->after('curah_hujan');
            $table->decimal('suhu_min', 5, 2)->nullable()->after('topografi');
            $table->decimal('suhu_max', 5, 2)->nullable()->after('suhu_min');
            $table->decimal('jarak_kecamatan_km', 8, 2)->nullable()->after('suhu_max');
            $table->decimal('jarak_kabupaten_km', 8, 2)->nullable()->after('jarak_kecamatan_km');
            $table->decimal('jarak_provinsi_km', 8, 2)->nullable()->after('jarak_kabupaten_km');
            $table->decimal('jarak_ibukota_km', 8, 2)->nullable()->after('jarak_provinsi_km');
            $table->text('sejarah_singkat')->nullable()->after('sejarah');
            $table->text('visi_misi')->nullable()->after('misi');
        });
    }

    public function down(): void
    {
        Schema::table('profil_desas', function (Blueprint $table) {
            $table->dropColumn([
                'alamat_kantor', 'email', 'luas_wilayah_ha', 'ketinggian_min_m', 'ketinggian_max_m',
                'curah_hujan', 'topografi', 'suhu_min', 'suhu_max',
                'jarak_kecamatan_km', 'jarak_kabupaten_km', 'jarak_provinsi_km', 'jarak_ibukota_km',
                'sejarah_singkat', 'visi_misi',
            ]);
        });
    }
};