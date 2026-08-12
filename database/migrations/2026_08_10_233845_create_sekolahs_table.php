<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sekolah', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sekolah');
            $table->string('jenjang'); // PAUD, SD/MI/PA, SMP/MTs/PB, SMA/MA/PC, Umum
            $table->string('status'); // negeri / swasta
            $table->foreignId('dusun_id')->nullable()->constrained('dusun')->nullOnDelete();
            $table->integer('jumlah_murid')->nullable();
            $table->integer('jumlah_guru')->nullable();
            $table->timestamps();
        });
    }
 
    public function down(): void
    {
        Schema::dropIfExists('sekolah');
    }
};