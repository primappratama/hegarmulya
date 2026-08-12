<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profil_desas', function (Blueprint $table) {
            $table->string('jenis_tanah')->nullable()->after('topografi');
            $table->text('kondisi_tempat_tinggal')->nullable()->after('kondisi_sinyal');
        });
    }
 
    public function down(): void
    {
        Schema::table('profil_desas', function (Blueprint $table) {
            $table->dropColumn(['jenis_tanah', 'kondisi_tempat_tinggal']);
        });
    }
};