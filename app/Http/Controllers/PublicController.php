<?php

namespace App\Http\Controllers;

use App\Models\ProfilDesa;
use App\Models\StrukturPemerintahan;
use App\Models\Umkm;
use App\Models\Galeri;
use App\Models\Berita;
use App\Models\PesanKesan;
use App\Models\Dusun;
use App\Models\Irigasi;
use App\Models\SejarahKepalaDesa;
use App\Models\StatistikPenduduk;
use App\Models\Sungai;
use App\Models\MataAir;
use App\Models\FasilitasDesa;
use App\Models\Wisata;
use App\Models\BatasWilayah;
use App\Models\PerangkatDesa;
use App\Models\LembagaKemasyarakatan;
use App\Models\Ipm;
use App\Models\Sekolah;
use App\Models\SaranaKesehatan;
use App\Models\TenagaKesehatan;
use App\Models\UsahaEkonomi;

class PublicController extends Controller
{
    public function home()
    {
        $profil = ProfilDesa::first();
        $pesanKesan = PesanKesan::where('tampilkan', true)->orderBy('urutan')->get();
        $beritaTerbaru = Berita::latest('tanggal')->take(3)->get();
        $umkmUnggulan = Umkm::latest()->take(3)->get();

        return view('public.home', compact('profil', 'pesanKesan', 'beritaTerbaru', 'umkmUnggulan'));
    }

    public function profil()
    {
        $profil = ProfilDesa::first();
        $dusun = Dusun::orderBy('nama_dusun')->get();
        $irigasi = Irigasi::orderBy('jenis_pengairan')->get();
        $sungai = Sungai::orderBy('nama_sungai')->get();
        $mataAir = MataAir::with('dusun')->get()->groupBy(fn($m) => $m->dusun->nama_dusun ?? 'Lainnya');
        $sejarahKades = SejarahKepalaDesa::orderBy('periode_mulai')->get();
        $statistik = StatistikPenduduk::orderBy('tahun', 'desc')->get()->groupBy('kategori');
    
        $batasWilayah = BatasWilayah::orderByRaw("FIELD(arah, 'utara','timur','selatan','barat')")->get();
        $perangkatDesa = PerangkatDesa::orderBy('id')->get();
        $lembaga = LembagaKemasyarakatan::orderBy('nama_lembaga')->get();
        $ipm = Ipm::latest('tahun')->first();
        $sekolah = Sekolah::orderBy('jenjang')->orderBy('nama_sekolah')->get()->groupBy('jenjang');
        $saranaKesehatan = SaranaKesehatan::orderBy('jenis')->get();
        $tenagaKesehatan = TenagaKesehatan::orderBy('jenis_tenaga')->get();
        $usahaEkonomi = UsahaEkonomi::orderBy('jenis_usaha')->get()->groupBy('jenis_usaha');
    
        return view('public.profil', compact(
            'profil', 'dusun', 'irigasi', 'sungai', 'mataAir', 'sejarahKades', 'statistik',
            'batasWilayah', 'perangkatDesa', 'lembaga', 'ipm', 'sekolah', 'saranaKesehatan', 'tenagaKesehatan', 'usahaEkonomi'
        ));
    }

    public function struktur()
    {
        $struktur = StrukturPemerintahan::whereNull('parent_id')->with('children.children')->orderBy('urutan')->get();
        return view('public.struktur', compact('struktur'));
    }

    public function umkm()
    {
        $umkms = Umkm::latest()->paginate(12);
        return view('public.umkm', compact('umkms'));
    }

    public function galeri()
    {
        $galeris = Galeri::latest()->paginate(16);
        return view('public.galeri', compact('galeris'));
    }

    public function berita()
    {
        $beritas = Berita::latest('tanggal')->paginate(9);
        return view('public.berita', compact('beritas'));
    }

    public function beritaDetail($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        return view('public.berita-detail', compact('berita'));
    }

    public function kontak()
    {
        $profil = ProfilDesa::first();
        return view('public.kontak', compact('profil'));
    }

    public function wisata()
    {
        $wisatas = Wisata::orderBy('kategori')->orderBy('nama_wisata')->get()->groupBy('kategori');
        return view('public.wisata', compact('wisatas'));
    }
}