<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sejarah_kepala_desa', function (Blueprint $table) {
            $table->id();
            $table->integer('periode_mulai');
            $table->integer('periode_selesai')->nullable();
            $table->string('nama_kepala_desa');
            $table->string('status')->nullable();
            $table->text('pencapaian')->nullable();
            $table->timestamps();
        });
    }
 
    public function down(): void
    {
        Schema::dropIfExists('sejarah_kepala_desa');
    }
};