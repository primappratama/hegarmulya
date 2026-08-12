<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('fasilitas_desa');
    }
 
    public function down(): void
    {
        Schema::create('fasilitas_desa', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');
            $table->string('jenis');
            $table->integer('jumlah')->default(0);
            $table->string('satuan')->nullable();
            $table->timestamps();
        });
    }
};