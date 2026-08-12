<x-layouts.guest-public>

    <section style="padding-top:160px;padding-bottom:60px;position:relative;background:linear-gradient(180deg, rgba(18,52,48,.7) 0%, rgba(18,52,48,.95) 100%), linear-gradient(135deg, #2a5c53 0%, #1D4A43 55%, #123430 100%);overflow:hidden;">
        <div style="position:absolute;inset:0;background-image:radial-gradient(circle at 85% 15%, rgba(204,153,102,0.12) 0%, transparent 45%);"></div>
        <div style="position:relative;z-index:2;max-width:680px;">
            <span class="eyebrow" style="color:var(--gold);">Tersembunyi &amp; Menunggu Dilihat</span>
            <h2 style="font-size:clamp(28px,4.5vw,52px);font-weight:600;letter-spacing:-.02em;line-height:1.15;color:var(--cream);">
                Potensi wisata Hegarmulya
            </h2>
            <p style="margin-top:18px;font-size:16px;line-height:1.7;color:rgba(246,230,216,0.75);max-width:560px;">
                Di balik bukit dan akses jalan yang belum sepenuhnya mulus, Hegarmulya menyimpan
                {{ $wisatas->flatten()->count() }} titik keindahan alam yang belum banyak terjamah, dari air terjun hingga gua alami.
            </p>
        </div>
    </section>

    <section style="padding-top:56px;">
        @if ($wisatas->isEmpty())
            <p style="color:#8a8a82;font-size:15px;">Belum ada data wisata yang ditambahkan.</p>
        @else
            @foreach ($wisatas as $kategori => $items)
                <div class="reveal-up" style="margin-bottom:64px;">
                    <div style="display:flex;align-items:baseline;gap:12px;margin-bottom:24px;">
                        <h3 style="font-size:22px;font-weight:600;color:var(--teal);letter-spacing:-.01em;">{{ $kategori }}</h3>
                        <span style="font-size:13px;color:var(--olive);font-weight:600;">{{ $items->count() }} lokasi</span>
                    </div>

                    <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:1px;background:rgba(29,74,67,0.1);">
                        @foreach ($items as $w)
                            <div style="background:var(--cream);overflow:hidden;">
                                <div style="aspect-ratio:1;background:#e4d5c3;overflow:hidden;position:relative;">
                                    @if ($w->foto)
                                        <img src="{{ Storage::url($w->foto) }}" alt="{{ $w->nama_wisata }}"
                                             style="width:100%;height:100%;object-fit:cover;transition:transform .5s cubic-bezier(.4,0,.2,1);"
                                             onmouseover="this.style.transform='scale(1.06)'" onmouseout="this.style.transform='scale(1)'">
                                    @else
                                        <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;color:var(--olive);font-size:12px;text-align:center;padding:12px;">
                                            {{ $kategori === 'Curug' ? '💧' : ($kategori === 'Gua' ? '🕳️' : '📍') }}<br>Foto menyusul
                                        </div>
                                    @endif
                                </div>
                                <div style="padding:16px 14px;">
                                    <h4 style="font-size:13.5px;font-weight:600;color:var(--teal);line-height:1.3;">{{ $w->nama_wisata }}</h4>
                                    @if ($w->keterangan)
                                        <p style="font-size:11.5px;color:#8a8a82;margin-top:4px;line-height:1.4;">{{ Str::limit($w->keterangan, 60) }}</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        @endif
    </section>

    <section class="cta reveal-up">
        <span class="eyebrow">Belum Tereksplor</span>
        <h2>Sebagian besar lokasi ini bahkan belum punya dokumentasi foto.</h2>
        <p style="color:rgba(246,230,216,0.65);font-size:14px;margin-top:-16px;margin-bottom:32px;">
            Bantu kami mendokumentasikan dan mempromosikan potensi ini ke lebih banyak orang.
        </p>
        <a href="{{ route('kontak') }}" class="btn btn-solid">Hubungi kami</a>
    </section>

</x-layouts.guest-public>