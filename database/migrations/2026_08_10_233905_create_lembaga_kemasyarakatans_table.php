<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lembaga_kemasyarakatan', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun')->nullable();
            $table->string('nama_lembaga');
            $table->integer('jumlah_pengurus')->default(0);
            $table->timestamps();
        });
    }
 
    public function down(): void
    {
        Schema::dropIfExists('lembaga_kemasyarakatan');
    }
};