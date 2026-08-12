<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ipm', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun');
            $table->decimal('indeks_pendidikan', 5, 2)->nullable();
            $table->decimal('indeks_kesehatan', 5, 2)->nullable();
            $table->decimal('indeks_daya_beli', 5, 2)->nullable();
            $table->decimal('realisasi_ipm', 5, 2)->nullable();
            $table->decimal('target_ipm_kecamatan', 5, 2)->nullable();
            $table->decimal('target_ipm_kabupaten', 5, 2)->nullable();
            $table->timestamps();
        });
    }
 
    public function down(): void
    {
        Schema::dropIfExists('ipm');
    }
};