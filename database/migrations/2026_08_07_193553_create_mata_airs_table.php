<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mata_air', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dusun_id')->nullable()->constrained('dusun')->nullOnDelete();
            $table->string('nama_mata_air');
            $table->timestamps();
        });
    }
 
    public function down(): void
    {
        Schema::dropIfExists('mata_air');
    }
};