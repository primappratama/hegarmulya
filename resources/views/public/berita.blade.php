<x-layouts.guest-public>

    <section style="padding-top:160px;padding-bottom:60px;background:var(--teal-deep);">
        <div style="max-width:640px;">
            <span class="eyebrow" style="color:var(--gold);">Kegiatan</span>
            <h2 style="font-size:clamp(28px,4vw,48px);font-weight:600;letter-spacing:-.02em;line-height:1.15;color:var(--cream);">Berita &amp; kegiatan</h2>
            <p style="margin-top:18px;font-size:16px;line-height:1.7;color:rgba(246,230,216,0.75);max-width:520px;">
                Perkembangan dan momen penting di Desa Hegarmulya, terdokumentasi di sini.
            </p>
        </div>
    </section>

    <section style="padding-top:60px;">
        @if ($beritas->isEmpty())
            <p style="color:#8a8a82;font-size:15px;">Belum ada berita yang dipublikasikan.</p>
        @else
            <div class="berita-list reveal-up">
                @foreach ($beritas as $berita)
                    <a href="{{ route('berita.detail', $berita->slug) }}" class="berita-item">
                        <div class="berita-left">
                            <span class="berita-date">{{ strtoupper($berita->tanggal->translatedFormat('d M Y')) }}</span>
                            <span class="berita-title">{{ $berita->judul }}</span>
                        </div>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                    </a>
                @endforeach
            </div>

            <div style="margin-top:48px;display:flex;justify-content:center;">
                {{ $beritas->links() }}
            </div>
        @endif
    </section>

</x-layouts.guest-public>
