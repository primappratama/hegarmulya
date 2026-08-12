<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tenaga_kesehatan', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun');
            $table->string('jenis_tenaga');
            $table->integer('jumlah')->default(0);
            $table->timestamps();
        });
    }
 
    public function down(): void
    {
        Schema::dropIfExists('tenaga_kesehatan');
    }
};