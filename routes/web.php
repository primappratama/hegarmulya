<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProfilDesaController;
use App\Http\Controllers\Admin\StrukturController;
use App\Http\Controllers\Admin\UmkmController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\PesanKesanController;
use App\Http\Controllers\Admin\DusunController;
use App\Http\Controllers\Admin\IrigasiController;
use App\Http\Controllers\Admin\SejarahKepalaDesaController;
use App\Http\Controllers\Admin\StatistikPendudukController;
use App\Http\Controllers\Admin\SungaiController;
use App\Http\Controllers\Admin\MataAirController;
use App\Http\Controllers\Admin\WisataController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Admin\BatasWilayahController;
use App\Http\Controllers\Admin\PerangkatDesaController;
use App\Http\Controllers\Admin\LembagaKemasyarakatanController;
use App\Http\Controllers\Admin\IpmController;
use App\Http\Controllers\Admin\SekolahController;
use App\Http\Controllers\Admin\SaranaKesehatanController;
use App\Http\Controllers\Admin\TenagaKesehatanController;
use App\Http\Controllers\Admin\UsahaEkonomiController;

// ===== PUBLIC ROUTES =====
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/profil', [PublicController::class, 'profil'])->name('profil');
Route::get('/struktur', [PublicController::class, 'struktur'])->name('struktur');
Route::get('/umkm', [PublicController::class, 'umkm'])->name('umkm');
Route::get('/galeri', [PublicController::class, 'galeri'])->name('galeri');
Route::get('/berita', [PublicController::class, 'berita'])->name('berita');
Route::get('/berita/{slug}', [PublicController::class, 'beritaDetail'])->name('berita.detail');
Route::get('/kontak', [PublicController::class, 'kontak'])->name('kontak');
Route::get('/wisata', [PublicController::class, 'wisata'])->name('wisata');

// ===== BREEZE PROFILE ROUTES (akun user Breeze, bukan "Profil Desa") =====
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ===== ADMIN ROUTES (perlu login) =====
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('profil-desa', ProfilDesaController::class);
    Route::resource('struktur', StrukturController::class);
    Route::resource('umkm', UmkmController::class);
    Route::resource('galeri', GaleriController::class);
    Route::resource('berita', BeritaController::class);
    Route::resource('pesan-kesan', PesanKesanController::class);
    Route::resource('dusun', DusunController::class)->except(['show']);
    Route::resource('irigasi', IrigasiController::class)->except(['show']);
    Route::resource('sejarah-kepala-desa', SejarahKepalaDesaController::class)->except(['show']);
    Route::resource('statistik-penduduk', StatistikPendudukController::class)->except(['show']);
    Route::resource('sungai', SungaiController::class)->except(['show']);
    Route::resource('mata-air', MataAirController::class)->except(['show']);
    Route::resource('wisata', WisataController::class)->except(['show'])->parameters(['wisata' => 'wisata']);
    Route::resource('batas-wilayah', BatasWilayahController::class)->except(['show']);
    Route::resource('perangkat-desa', PerangkatDesaController::class)->except(['show'])->parameters(['perangkat-desa' => 'perangkat_desa']);
    Route::resource('lembaga-kemasyarakatan', LembagaKemasyarakatanController::class)->except(['show'])->parameters(['lembaga-kemasyarakatan' => 'lembaga_kemasyarakatan']);
    Route::resource('ipm', IpmController::class)->except(['show']);
    Route::resource('sekolah', SekolahController::class)->except(['show']);
    Route::resource('sarana-kesehatan', SaranaKesehatanController::class)->except(['show'])->parameters(['sarana-kesehatan' => 'sarana_kesehatan']);
    Route::resource('tenaga-kesehatan', TenagaKesehatanController::class)->except(['show'])->parameters(['tenaga-kesehatan' => 'tenaga_kesehatan']);
    Route::resource('usaha-ekonomi', UsahaEkonomiController::class)->except(['show'])->parameters(['usaha-ekonomi' => 'usaha_ekonomi']);
});

// Alias supaya redirect bawaan Breeze (route 'dashboard') tetap jalan
Route::redirect('/dashboard', '/admin/dashboard')->middleware('auth')->name('dashboard');

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});
 
Route::middleware('auth')->group(function () {
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

// require __DIR__.'/auth.php';