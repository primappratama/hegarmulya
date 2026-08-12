<x-layouts.guest-public>

    <section style="padding-top:160px;padding-bottom:60px;background:var(--teal-deep);">
        <div style="max-width:640px;">
            <span class="eyebrow" style="color:var(--gold);">Pemerintahan</span>
            <h2 style="font-size:clamp(28px,4vw,48px);font-weight:600;letter-spacing:-.02em;line-height:1.15;color:var(--cream);">Struktur desa</h2>
            <p style="margin-top:18px;font-size:16px;line-height:1.7;color:rgba(246,230,216,0.75);max-width:520px;">
                Perangkat desa yang menjalankan roda pemerintahan Hegarmulya.
            </p>
        </div>
    </section>

    <section style="padding-top:60px;">
        @if ($struktur->isEmpty())
            <p style="color:#8a8a82;font-size:15px;">Struktur pemerintahan belum ditambahkan.</p>
        @else
            @foreach ($struktur as $level1)
                <div class="reveal-up" style="margin-bottom:56px;">
                    {{-- Level teratas (misal: Kepala Desa) --}}
                    <div style="display:flex;align-items:center;gap:20px;padding:24px;background:var(--teal);border-radius:4px;margin-bottom:24px;max-width:420px;">
                        <div style="width:56px;height:56px;border-radius:50%;overflow:hidden;background:var(--olive);flex-shrink:0;">
                            @if ($level1->foto)
                                <img src="{{ Storage::url($level1->foto) }}" style="width:100%;height:100%;object-fit:cover;">
                            @endif
                        </div>
                        <div>
                            <h3 style="font-size:17px;font-weight:600;color:var(--cream);">{{ $level1->nama }}</h3>
                            <p style="font-size:13px;color:var(--gold);font-weight:500;margin-top:2px;">{{ $level1->jabatan }}</p>
                        </div>
                    </div>

                    {{-- Level di bawahnya --}}
                    @if ($level1->children->isNotEmpty())
                        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:1px;background:rgba(29,74,67,0.1);margin-left:24px;">
                            @foreach ($level1->children as $level2)
                                <div style="background:var(--cream);padding:24px;">
                                    <div style="width:44px;height:44px;border-radius:50%;overflow:hidden;background:#e4d5c3;margin-bottom:14px;">
                                        @if ($level2->foto)
                                            <img src="{{ Storage::url($level2->foto) }}" style="width:100%;height:100%;object-fit:cover;">
                                        @endif
                                    </div>
                                    <h4 style="font-size:15px;font-weight:600;color:var(--teal);">{{ $level2->nama }}</h4>
                                    <p style="font-size:12.5px;color:var(--olive);font-weight:500;margin-top:2px;">{{ $level2->jabatan }}</p>

                                    @if ($level2->children->isNotEmpty())
                                        <div style="margin-top:14px;padding-top:14px;border-top:1px solid rgba(29,74,67,0.1);">
                                            @foreach ($level2->children as $level3)
                                                <p style="font-size:12.5px;color:#5a5a56;margin-bottom:4px;">{{ $level3->nama }} &mdash; {{ $level3->jabatan }}</p>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
        @endif
    </section>

</x-layouts.guest-public>