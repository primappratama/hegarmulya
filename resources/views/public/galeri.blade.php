<x-layouts.guest-public>

    <section style="padding-top:160px;padding-bottom:60px;background:var(--teal-deep);">
        <div style="max-width:640px;">
            <span class="eyebrow" style="color:var(--gold);">Dokumentasi</span>
            <h2 style="font-size:clamp(28px,4vw,48px);font-weight:600;letter-spacing:-.02em;line-height:1.15;color:var(--cream);">Galeri Hegarmulya</h2>
            <p style="margin-top:18px;font-size:16px;line-height:1.7;color:rgba(246,230,216,0.75);max-width:520px;">
                Potret keseharian, keindahan alam, dan momen-momen di Desa Hegarmulya.
            </p>
        </div>
    </section>

    <section style="padding-top:60px;">
        @if ($galeris->isEmpty())
            <p style="color:#8a8a82;font-size:15px;">Belum ada foto yang ditambahkan.</p>
        @else
            <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:6px;">
                @foreach ($galeris as $foto)
                    <div class="reveal-up" style="aspect-ratio:1;overflow:hidden;background:#e4d5c3;position:relative;cursor:pointer;">
                        <img src="{{ Storage::url($foto->foto) }}" alt="{{ $foto->judul ?? 'Galeri Hegarmulya' }}"
                             style="width:100%;height:100%;object-fit:cover;transition:transform .5s cubic-bezier(.4,0,.2,1);"
                             onmouseover="this.style.transform='scale(1.06)'" onmouseout="this.style.transform='scale(1)'">
                        @if ($foto->judul)
                            <div style="position:absolute;bottom:0;left:0;right:0;padding:14px 16px;background:linear-gradient(180deg, transparent, rgba(18,52,48,0.85));">
                                <span style="font-size:12.5px;color:var(--cream);font-weight:500;">{{ $foto->judul }}</span>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>

            <div style="margin-top:48px;display:flex;justify-content:center;">
                {{ $galeris->links() }}
            </div>
        @endif
    </section>

</x-layouts.guest-public>