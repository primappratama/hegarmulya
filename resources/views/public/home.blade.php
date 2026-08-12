<x-layouts.guest-public>

    <section class="hero" style="height:100vh;min-height:640px;position:relative;display:flex;flex-direction:column;justify-content:flex-end;padding:0 6vw 64px;background:linear-gradient(180deg, rgba(18,52,48,.55) 0%, rgba(18,52,48,.35) 40%, rgba(18,52,48,.92) 100%), linear-gradient(135deg, #2a5c53 0%, #1D4A43 55%, #123430 100%);overflow:hidden;">
        <div style="position:absolute;inset:0;background-image:radial-gradient(circle at 20% 30%, rgba(204,153,102,0.12) 0%, transparent 45%), radial-gradient(circle at 80% 70%, rgba(102,153,102,0.15) 0%, transparent 50%);"></div>

        <div style="position:relative;z-index:2;max-width:920px;">
            <div style="display:flex;align-items:center;gap:10px;font-size:12px;font-weight:600;letter-spacing:1.5px;text-transform:uppercase;color:var(--gold);margin-bottom:24px;opacity:0;transform:translateY(16px);animation:reveal .9s cubic-bezier(.4,0,.2,1) .3s forwards;">
                <span style="width:6px;height:6px;border-radius:50%;background:var(--gold);"></span>
                {{ $profil->kecamatan ?? 'Kecamatan Cidadap' }}, {{ $profil->kabupaten ?? 'Kabupaten Sukabumi' }}
            </div>

            <h1 style="font-size:clamp(40px,6.5vw,88px);font-weight:600;line-height:1.02;letter-spacing:-.02em;color:var(--cream);margin-bottom:28px;opacity:0;transform:translateY(24px);animation:reveal 1s cubic-bezier(.4,0,.2,1) .5s forwards;">
                Tersembunyi di<br>balik bukit, <em style="font-style:italic;font-weight:500;color:var(--gold);">hidup</em><br>dalam ketenangan.
            </h1>

            <p style="font-size:clamp(15px,1.6vw,19px);line-height:1.65;color:rgba(246,230,216,0.82);max-width:560px;margin-bottom:40px;opacity:0;transform:translateY(20px);animation:reveal 1s cubic-bezier(.4,0,.2,1) .7s forwards;">
                {{ $profil->nama_desa ?? 'Desa Hegarmulya' }} jarang terlihat di peta, jarang terdengar namanya. Tapi di sinilah keindahan alam dan kegigihan warganya bertahan setiap hari, menunggu untuk dilihat.
            </p>

            <div style="display:flex;gap:16px;align-items:center;opacity:0;transform:translateY(20px);animation:reveal 1s cubic-bezier(.4,0,.2,1) .9s forwards;">
                <a href="#pesan" class="btn btn-solid">Baca ceritanya</a>
                <a href="{{ route('profil') }}" class="btn btn-ghost">Jelajahi desa</a>
            </div>
        </div>

        <div style="position:absolute;bottom:28px;right:6vw;z-index:2;display:flex;flex-direction:column;align-items:center;gap:10px;opacity:0;animation:reveal 1s ease 1.3s forwards;">
            <div style="width:1px;height:48px;background:rgba(246,230,216,0.3);"></div>
            <span style="font-size:11px;letter-spacing:2px;color:rgba(246,230,216,0.55);writing-mode:vertical-rl;">SCROLL</span>
        </div>
    </section>

    <style>@keyframes reveal{to{opacity:1;transform:translateY(0);}}</style>

    <div class="facts">
        <div class="fact">
            <div class="fact-num">{{ $profil->jarak_pusat_kota ?? '~14 km' }}</div>
            <div class="fact-label">JARAK DARI PUSAT KOTA</div>
        </div>
        <div class="fact">
            <div class="fact-num">{{ $profil->kondisi_sinyal ?? 'Terbatas' }}</div>
            <div class="fact-label">KEKUATAN SINYAL</div>
        </div>
        <div class="fact">
            <div class="fact-num">1.240</div>
            <div class="fact-label">JIWA PENDUDUK</div>
        </div>
        <div class="fact">
            <div class="fact-num">{{ $umkmUnggulan->count() }}</div>
            <div class="fact-label">POTENSI UMKM AKTIF</div>
        </div>
    </div>

    @if ($pesanKesan->isNotEmpty())
        @php $pesan = $pesanKesan->first(); @endphp
        <section id="pesan" class="pesan">
            <div class="pesan-inner">
                <span class="eyebrow">{{ $pesan->judul ?? 'Pesan dari Hegarmulya' }}</span>
                <p class="pesan-quote"><span class="mark">&ldquo;</span>{{ Str::limit(strip_tags($pesan->narasi), 140) }}<span class="mark">&rdquo;</span></p>
                <div class="pesan-body">
                    <p>{{ $pesan->narasi }}</p>
                </div>
                <div class="pesan-sign">
                    <div class="pesan-sign-line"></div>
                    <span>Ditulis oleh {{ $pesan->nama_penulis ?? 'Tim KKN Kelompok 10' }}</span>
                </div>
            </div>
        </section>
    @else
        <section id="pesan" class="pesan">
            <div class="pesan-inner">
                <span class="eyebrow">Pesan dari Hegarmulya</span>
                <p class="pesan-quote"><span class="mark">&ldquo;</span>Jalan menuju desa kami mungkin sulit dilalui, tapi semangat warganya tidak pernah surut.<span class="mark">&rdquo;</span></p>
                <div class="pesan-body">
                    <p>Untuk sampai ke sini, kamu harus melewati jalan berbatu yang belum sepenuhnya beraspal, dan di beberapa titik, sinyal telepon menghilang begitu saja. Tapi begitu tiba, yang menyambut adalah udara sejuk, sawah yang membentang, dan warga yang menyapa dengan tulus.</p>
                    <p>Kami menuliskan halaman ini bukan untuk mengeluh, tapi untuk bercerita jujur. Desa Hegarmulya punya potensi besar yang belum banyak dilihat, dari hasil bumi hingga kerajinan tangan warganya. Kami berharap, cerita ini sampai ke mata yang tepat.</p>
                </div>
                <div class="pesan-sign">
                    <div class="pesan-sign-line"></div>
                    <span>Ditulis oleh Tim KKN Kelompok 10 &mdash; Juli 2026</span>
                </div>
            </div>
        </section>
    @endif

    <section>
        <div class="section-head reveal-up">
            <span class="eyebrow">Jelajahi</span>
            <h2>Kenali Hegarmulya lebih dekat</h2>
            <p>Dari sejarah desa hingga usaha warga yang terus bertumbuh, semua tersimpan di sini.</p>
        </div>
    </section>

    <div class="grid-cards">
        <a href="{{ route('profil') }}" class="card reveal-up">
            <div class="card-num">01</div>
            <div>
                <h3>Profil Desa</h3>
                <p>Sejarah, visi, dan kondisi geografis Hegarmulya.</p>
            </div>
            <div class="card-arrow"><svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></div>
        </a>
        <a href="{{ route('umkm') }}" class="card reveal-up">
            <div class="card-num">02</div>
            <div>
                <h3>UMKM & Potensi</h3>
                <p>Usaha warga yang menjadi tulang punggung ekonomi desa.</p>
            </div>
            <div class="card-arrow"><svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></div>
        </a>
        <a href="{{ route('galeri') }}" class="card reveal-up">
            <div class="card-num">03</div>
            <div>
                <h3>Galeri</h3>
                <p>Potret keseharian dan keindahan alam Hegarmulya.</p>
            </div>
            <div class="card-arrow"><svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></div>
        </a>
        <a href="{{ route('struktur') }}" class="card reveal-up">
            <div class="card-num">04</div>
            <div>
                <h3>Struktur Desa</h3>
                <p>Perangkat dan pemerintahan yang menjalankan Hegarmulya.</p>
            </div>
            <div class="card-arrow"><svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></div>
        </a>
    </div>

    <section>
        <div class="section-head reveal-up">
            <span class="eyebrow">Kegiatan</span>
            <h2>Berita &amp; kegiatan terbaru</h2>
        </div>
        <div class="berita-list reveal-up">
            @forelse ($beritaTerbaru as $berita)
                <a href="{{ route('berita.detail', $berita->slug) }}" class="berita-item">
                    <div class="berita-left">
                        <span class="berita-date">{{ strtoupper($berita->tanggal->translatedFormat('d M Y')) }}</span>
                        <span class="berita-title">{{ $berita->judul }}</span>
                    </div>
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                </a>
            @empty
                <p style="color:#8a8a82;font-size:15px;">Belum ada berita yang dipublikasikan.</p>
            @endforelse
        </div>
    </section>

    <section class="cta reveal-up">
        <span class="eyebrow">Terhubung dengan kami</span>
        <h2>Desa ini butuh dilihat, bukan sekadar dikunjungi.</h2>
        <a href="{{ route('kontak') }}" class="btn btn-solid">Hubungi kami</a>
    </section>

</x-layouts.guest-public>
