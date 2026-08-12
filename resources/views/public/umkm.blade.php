<x-layouts.guest-public>

    <section style="padding-top:160px;padding-bottom:60px;background:var(--teal-deep);">
        <div style="max-width:640px;">
            <span class="eyebrow" style="color:var(--gold);">Ekonomi Desa</span>
            <h2 style="font-size:clamp(28px,4vw,48px);font-weight:600;letter-spacing:-.02em;line-height:1.15;color:var(--cream);">UMKM &amp; potensi warga</h2>
            <p style="margin-top:18px;font-size:16px;line-height:1.7;color:rgba(246,230,216,0.75);max-width:520px;">
                Usaha kecil yang menjadi tulang punggung ekonomi Hegarmulya, dijalankan dengan tangan dan ketekunan warga.
            </p>
        </div>
    </section>

    <section style="padding-top:60px;">
        @if ($umkms->isEmpty())
            <p style="color:#8a8a82;font-size:15px;">Belum ada data UMKM yang ditambahkan.</p>
        @else
            <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:1px;background:rgba(29,74,67,0.1);">
                @foreach ($umkms as $umkm)
                    <div class="reveal-up" style="background:var(--cream);display:flex;flex-direction:column;">
                        <div style="aspect-ratio:4/3;background:#e4d5c3;overflow:hidden;">
                            @if ($umkm->foto)
                                <img src="{{ Storage::url($umkm->foto) }}" alt="{{ $umkm->nama_usaha }}" style="width:100%;height:100%;object-fit:cover;">
                            @else
                                <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;color:var(--olive);font-size:13px;">Belum ada foto</div>
                            @endif
                        </div>
                        <div style="padding:28px 24px;flex:1;display:flex;flex-direction:column;">
                            @if ($umkm->kategori)
                                <span style="font-size:11.5px;font-weight:600;letter-spacing:.5px;text-transform:uppercase;color:var(--olive);">{{ $umkm->kategori }}</span>
                            @endif
                            <h3 style="font-size:19px;font-weight:600;color:var(--teal);margin:10px 0 6px;letter-spacing:-.01em;">{{ $umkm->nama_usaha }}</h3>
                            <p style="font-size:13.5px;color:#6b6b64;margin-bottom:14px;">Oleh {{ $umkm->nama_pemilik }}</p>
                            @if ($umkm->deskripsi)
                                <p style="font-size:14px;line-height:1.6;color:#5a5a56;margin-bottom:18px;">{{ Str::limit($umkm->deskripsi, 90) }}</p>
                            @endif
                            @if ($umkm->kontak)
                                <div style="margin-top:auto;padding-top:14px;border-top:1px solid rgba(29,74,67,0.1);font-size:13px;color:var(--teal);font-weight:500;">
                                    {{ $umkm->kontak }}
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <div style="margin-top:48px;display:flex;justify-content:center;">
                {{ $umkms->links() }}
            </div>
        @endif
    </section>

</x-layouts.guest-public>