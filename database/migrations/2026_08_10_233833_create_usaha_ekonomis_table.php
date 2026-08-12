<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usaha_ekonomi', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_usaha');
            $table->string('sub_jenis');
            $table->integer('jumlah')->default(0);
            $table->integer('tahun')->nullable();
            $table->timestamps();
        });
    }
 
    public function down(): void
    {
        Schema::dropIfExists('usaha_ekonomi');
    }
};