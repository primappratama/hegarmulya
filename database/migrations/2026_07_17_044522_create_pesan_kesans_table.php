<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesan_kesans', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->nullable();
            $table->text('narasi');
            $table->string('nama_penulis')->nullable();
            $table->string('foto')->nullable();
            $table->boolean('tampilkan')->default(true);
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesan_kesans');
    }
};