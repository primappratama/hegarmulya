<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('statistik_penduduk', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun');
            $table->string('kategori');
            $table->string('sub_kategori');
            $table->integer('nilai');
            $table->string('satuan')->nullable();
            $table->timestamps();
        });
    }
 
    public function down(): void
    {
        Schema::dropIfExists('statistik_penduduk');
    }
};