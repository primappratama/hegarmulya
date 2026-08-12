<x-layouts.guest-public>

    <section style="padding-top:160px;padding-bottom:0;">
        <div style="max-width:760px;">
            <span class="eyebrow">{{ strtoupper($berita->tanggal->translatedFormat('d M Y')) }}</span>
            <h1 style="font-size:clamp(28px,4.2vw,46px);font-weight:600;letter-spacing:-.02em;line-height:1.2;color:var(--teal);margin-top:14px;">
                {{ $berita->judul }}
            </h1>
        </div>
    </section>

    @if ($berita->foto)
        <section style="padding-top:48px;padding-bottom:0;">
            <div style="max-width:900px;aspect-ratio:16/9;border-radius:4px;overflow:hidden;background:#e4d5c3;">
                <img src="{{ Storage::url($berita->foto) }}" alt="{{ $berita->judul }}" style="width:100%;height:100%;object-fit:cover;">
            </div>
        </section>
    @endif

    <section>
        <div style="max-width:760px;font-size:16.5px;line-height:1.9;color:#3a3a37;">
            {!! nl2br(e($berita->konten)) !!}
        </div>

        <div style="margin-top:64px;">
            <a href="{{ route('berita') }}" class="btn btn-outline-dark">&larr; Kembali ke berita</a>
        </div>
    </section>

</x-layouts.guest-public>