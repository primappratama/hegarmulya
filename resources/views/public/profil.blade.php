<x-layouts.guest-public>

    <section style="padding-top:160px;padding-bottom:80px;position:relative;background:linear-gradient(180deg, rgba(18,52,48,.7) 0%, rgba(18,52,48,.95) 100%), linear-gradient(135deg, #2a5c53 0%, #1D4A43 55%, #123430 100%);overflow:hidden;">
        <div style="position:absolute;inset:0;background-image:radial-gradient(circle at 15% 20%, rgba(204,153,102,0.10) 0%, transparent 45%);"></div>
        <div style="position:relative;z-index:2;max-width:680px;">
            <span class="eyebrow" style="color:var(--gold);">Tentang Kami</span>
            <h2 style="font-size:clamp(28px,4.5vw,52px);font-weight:600;letter-spacing:-.02em;line-height:1.15;color:var(--cream);">
                Desa {{ $profil->nama_desa ?? 'Hegarmulya' }}
            </h2>
            <p style="margin-top:18px;font-size:16px;line-height:1.7;color:rgba(246,230,216,0.75);">
                Kecamatan {{ $profil->kecamatan ?? 'Cidadap' }}, {{ $profil->kabupaten ?? 'Kabupaten Sukabumi' }}, {{ $profil->provinsi ?? 'Jawa Barat' }}
            </p>
        </div>
    </section>

    {{-- Sejarah --}}
    <section style="padding-top:80px;">
        <div class="section-head reveal-up">
            <span class="eyebrow">Asal Usul</span>
            <h2>Sejarah Desa</h2>
        </div>
        <div class="reveal-up" style="max-width:760px;font-size:16px;line-height:1.9;color:#4a4a46;white-space:pre-line;">
            {{ $profil->sejarah_singkat ?? $profil->sejarah ?? 'Sejarah Desa Hegarmulya akan segera dilengkapi.' }}
        </div>
    </section>

    {{-- Kondisi Geografis --}}
    <section>
        <div class="section-head reveal-up">
            <span class="eyebrow">Geografis</span>
            <h2>Kondisi wilayah</h2>
        </div>
        <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:1px;background:rgba(29,74,67,0.1);max-width:1000px;">
            <div class="reveal-up" style="background:var(--cream);padding:28px 24px;">
                <span class="eyebrow" style="margin-bottom:8px;">Topografi</span>
                <p style="font-size:15px;color:#3a3a37;font-weight:500;">{{ $profil->topografi ?? '-' }}</p>
            </div>
            <div class="reveal-up" style="background:var(--cream);padding:28px 24px;">
                <span class="eyebrow" style="margin-bottom:8px;">Curah Hujan</span>
                <p style="font-size:15px;color:#3a3a37;font-weight:500;">{{ $profil->curah_hujan ?? '-' }}</p>
            </div>
            <div class="reveal-up" style="background:var(--cream);padding:28px 24px;">
                <span class="eyebrow" style="margin-bottom:8px;">Suhu</span>
                <p style="font-size:15px;color:#3a3a37;font-weight:500;">
                    @if($profil->suhu_min && $profil->suhu_max) {{ $profil->suhu_min }}&deg;C &ndash; {{ $profil->suhu_max }}&deg;C @else - @endif
                </p>
            </div>
            <div class="reveal-up" style="background:var(--cream);padding:28px 24px;">
                <span class="eyebrow" style="margin-bottom:8px;">Akses Jalan</span>
                <p style="font-size:13.5px;color:#3a3a37;line-height:1.6;">{{ $profil->kondisi_akses ?? 'Data belum tersedia' }}</p>
            </div>
        </div>
    </section>

    {{-- Batas Wilayah --}}
    @if ($batasWilayah->isNotEmpty())
        <section>
            <div class="section-head reveal-up">
                <span class="eyebrow">Administratif</span>
                <h2>Batas wilayah</h2>
            </div>
            <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:1px;background:rgba(29,74,67,0.1);max-width:1000px;">
                @foreach ($batasWilayah as $b)
                    <div class="reveal-up" style="background:var(--cream);padding:24px 20px;">
                        <span class="eyebrow" style="margin-bottom:6px;text-transform:uppercase;">{{ $b->arah }}</span>
                        <p style="font-size:13px;color:#4a4a46;line-height:1.6;">{{ $b->keterangan }}</p>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{-- Dusun --}}
    @if ($dusun->isNotEmpty())
        <section>
            <div class="section-head reveal-up">
                <span class="eyebrow">Wilayah Administratif</span>
                <h2>Dusun di Hegarmulya</h2>
                <p>Desa ini terbagi menjadi {{ $dusun->count() }} dusun.</p>
            </div>
            <div style="display:grid;grid-template-columns:repeat({{ min($dusun->count(), 4) }},1fr);gap:1px;background:rgba(29,74,67,0.1);max-width:1000px;">
                @foreach ($dusun as $d)
                    <div class="reveal-up" style="background:var(--cream);padding:26px 22px;">
                        <h3 style="font-size:17px;font-weight:600;color:var(--teal);">{{ $d->nama_dusun }}</h3>
                        @if ($d->arah)
                            <p style="font-size:12.5px;color:var(--olive);font-weight:600;margin-top:4px;">Arah {{ $d->arah }}</p>
                        @endif
                        <div style="margin-top:12px;font-size:13px;color:#6b6b64;">
                            @if ($d->luas_ha) <p>{{ $d->luas_ha }} ha</p> @endif
                            @if ($d->jumlah_rt) <p>{{ $d->jumlah_rt }} RT</p> @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{-- Irigasi --}}
    @if ($irigasi->isNotEmpty())
        <section>
            <div class="section-head reveal-up">
                <span class="eyebrow">Sumber Daya Air</span>
                <h2>Kondisi irigasi</h2>
            </div>
            <div class="berita-list reveal-up" style="max-width:900px;">
                @foreach ($irigasi as $ir)
                    <div class="berita-item" style="cursor:default;">
                        <div class="berita-left" style="flex-direction:column;align-items:flex-start;gap:4px;">
                            <span class="berita-title">{{ $ir->jenis_pengairan }}</span>
                            <span style="font-size:13px;color:#8a8a82;">{{ $ir->jumlah ?? '-' }} titik &middot; {{ $ir->kondisi }}</span>
                            @if ($ir->keterangan)
                                <span style="font-size:12.5px;color:var(--olive);">{{ $ir->keterangan }}</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{-- Sungai --}}
    @if ($sungai->isNotEmpty())
        <section>
            <div class="section-head reveal-up">
                <span class="eyebrow">Aliran Alami</span>
                <h2>Sungai</h2>
            </div>
            <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:1px;background:rgba(29,74,67,0.1);max-width:1000px;">
                @foreach ($sungai as $s)
                    <div class="reveal-up" style="background:var(--cream);padding:24px 22px;">
                        <h3 style="font-size:15.5px;font-weight:600;color:var(--teal);">{{ $s->nama_sungai }}</h3>
                        <p style="font-size:13px;color:#6b6b64;margin-top:6px;line-height:1.6;">{{ $s->keterangan }}</p>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{-- Mata Air --}}
    @if ($mataAir->isNotEmpty())
        <section>
            <div class="section-head reveal-up">
                <span class="eyebrow">Sumber Air Bersih</span>
                <h2>Mata air per dusun</h2>
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;max-width:1000px;">
                @foreach ($mataAir as $namaDusun => $items)
                    <div class="reveal-up" style="background:var(--cream);border:1px solid rgba(29,74,67,0.08);border-radius:4px;padding:22px;">
                        <h3 style="font-size:13px;font-weight:600;color:var(--olive);text-transform:uppercase;letter-spacing:.4px;margin-bottom:10px;">{{ $namaDusun }}</h3>
                        <p style="font-size:13.5px;color:#4a4a46;line-height:1.8;">{{ $items->pluck('nama_mata_air')->implode(', ') }}</p>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{-- Perangkat Desa & Lembaga Kemasyarakatan --}}
    @if ($perangkatDesa->isNotEmpty() || $lembaga->isNotEmpty())
        <section>
            <div class="section-head reveal-up">
                <span class="eyebrow">Kelembagaan</span>
                <h2>Perangkat & lembaga desa</h2>
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:24px;max-width:1000px;">
                @if ($perangkatDesa->isNotEmpty())
                    <div class="reveal-up" style="background:var(--teal);border-radius:4px;padding:24px;">
                        <h3 style="font-size:13px;font-weight:600;color:var(--gold);text-transform:uppercase;letter-spacing:.4px;margin-bottom:14px;">Perangkat Desa</h3>
                        @foreach ($perangkatDesa as $row)
                            <div style="display:flex;justify-content:space-between;padding:6px 0;border-bottom:1px solid rgba(246,230,216,0.1);font-size:13px;">
                                <span style="color:rgba(246,230,216,0.75);">{{ $row->jabatan }}</span>
                                <span style="font-weight:600;color:var(--cream);">{{ $row->jumlah }} orang</span>
                            </div>
                        @endforeach
                    </div>
                @endif
                @if ($lembaga->isNotEmpty())
                    <div class="reveal-up" style="background:var(--teal);border-radius:4px;padding:24px;">
                        <h3 style="font-size:13px;font-weight:600;color:var(--gold);text-transform:uppercase;letter-spacing:.4px;margin-bottom:14px;">Lembaga Kemasyarakatan</h3>
                        @foreach ($lembaga as $row)
                            <div style="display:flex;justify-content:space-between;padding:6px 0;border-bottom:1px solid rgba(246,230,216,0.1);font-size:13px;">
                                <span style="color:rgba(246,230,216,0.75);">{{ $row->nama_lembaga }}</span>
                                <span style="font-weight:600;color:var(--cream);">{{ $row->jumlah_pengurus }} pengurus</span>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- Pendidikan --}}
    @if ($sekolah->isNotEmpty())
        <section>
            <div class="section-head reveal-up">
                <span class="eyebrow">Layanan Publik</span>
                <h2>Fasilitas pendidikan</h2>
                <p>{{ $sekolah->flatten()->count() }} lembaga pendidikan tersebar di seluruh desa.</p>
            </div>
            <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:1px;background:rgba(29,74,67,0.1);max-width:1100px;">
                @foreach ($sekolah as $jenjang => $rows)
                    <div class="reveal-up" style="background:var(--cream);padding:22px;">
                        <h3 style="font-size:12.5px;font-weight:600;color:var(--olive);text-transform:uppercase;letter-spacing:.4px;margin-bottom:10px;">{{ $jenjang }} ({{ $rows->count() }})</h3>
                        @foreach ($rows as $s)
                            <p style="font-size:13px;color:#4a4a46;margin-bottom:4px;">{{ $s->nama_sekolah }} <span style="color:#9a9a92;">&middot; {{ ucfirst($s->status) }}</span></p>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{-- Kesehatan --}}
    @if ($saranaKesehatan->isNotEmpty() || $tenagaKesehatan->isNotEmpty())
        <section>
            <div class="section-head reveal-up">
                <span class="eyebrow">Layanan Publik</span>
                <h2>Fasilitas kesehatan</h2>
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:24px;max-width:1000px;">
                @if ($saranaKesehatan->isNotEmpty())
                    <div class="reveal-up" style="background:var(--cream);border:1px solid rgba(29,74,67,0.08);border-radius:4px;padding:24px;">
                        <h3 style="font-size:13px;font-weight:600;color:var(--olive);text-transform:uppercase;letter-spacing:.4px;margin-bottom:14px;">Sarana</h3>
                        @foreach ($saranaKesehatan as $row)
                            <div style="display:flex;justify-content:space-between;padding:7px 0;border-bottom:1px solid rgba(29,74,67,0.06);font-size:13.5px;">
                                <span style="color:#5a5a56;">{{ $row->jenis }}</span>
                                <span style="font-weight:600;color:var(--teal);">{{ $row->jumlah }} unit</span>
                            </div>
                        @endforeach
                    </div>
                @endif
                @if ($tenagaKesehatan->isNotEmpty())
                    <div class="reveal-up" style="background:var(--cream);border:1px solid rgba(29,74,67,0.08);border-radius:4px;padding:24px;">
                        <h3 style="font-size:13px;font-weight:600;color:var(--olive);text-transform:uppercase;letter-spacing:.4px;margin-bottom:14px;">Tenaga Kesehatan</h3>
                        @foreach ($tenagaKesehatan as $row)
                            <div style="display:flex;justify-content:space-between;padding:7px 0;border-bottom:1px solid rgba(29,74,67,0.06);font-size:13.5px;">
                                <span style="color:#5a5a56;">{{ $row->jenis_tenaga }}</span>
                                <span style="font-weight:600;color:var(--teal);">{{ $row->jumlah }} orang</span>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- Usaha Ekonomi --}}
    @if ($usahaEkonomi->isNotEmpty())
        <section>
            <div class="section-head reveal-up">
                <span class="eyebrow">Ekonomi Desa</span>
                <h2>Unit usaha warga</h2>
                <p>Gambaran umum jenis usaha yang dijalankan warga Hegarmulya.</p>
            </div>
            <div style="display:grid;grid-template-columns:repeat({{ min($usahaEkonomi->count(), 3) }},1fr);gap:1px;background:rgba(29,74,67,0.1);max-width:1000px;">
                @foreach ($usahaEkonomi as $jenisUsaha => $rows)
                    <div class="reveal-up" style="background:var(--cream);padding:22px;">
                        <h3 style="font-size:12.5px;font-weight:600;color:var(--olive);text-transform:uppercase;letter-spacing:.4px;margin-bottom:10px;">{{ $jenisUsaha }}</h3>
                        @foreach ($rows as $row)
                            <div style="display:flex;justify-content:space-between;font-size:13px;padding:5px 0;">
                                <span style="color:#4a4a46;">{{ $row->sub_jenis }}</span>
                                <span style="font-weight:600;color:var(--teal);">{{ $row->jumlah }}</span>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{-- IPM --}}
    @if ($ipm)
        <section>
            <div class="section-head reveal-up">
                <span class="eyebrow">Indikator Pembangunan</span>
                <h2>Indeks Pembangunan Manusia</h2>
                <p>Data tahun {{ $ipm->tahun }}. Angka lebih baru masih dalam proses konfirmasi.</p>
            </div>
            <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:1px;background:rgba(29,74,67,0.1);max-width:1000px;">
                <div class="reveal-up" style="background:var(--teal);padding:26px 22px;text-align:center;">
                    <div style="font-size:28px;font-weight:700;color:var(--cream);">{{ $ipm->realisasi_ipm ?? '-' }}</div>
                    <div style="font-size:11.5px;color:var(--gold);margin-top:4px;">REALISASI IPM</div>
                </div>
                <div class="reveal-up" style="background:var(--cream);padding:26px 22px;text-align:center;">
                    <div style="font-size:22px;font-weight:700;color:var(--teal);">{{ $ipm->indeks_pendidikan ?? '-' }}</div>
                    <div style="font-size:11px;color:#9a9a92;margin-top:4px;">PENDIDIKAN</div>
                </div>
                <div class="reveal-up" style="background:var(--cream);padding:26px 22px;text-align:center;">
                    <div style="font-size:22px;font-weight:700;color:var(--teal);">{{ $ipm->indeks_kesehatan ?? '-' }}</div>
                    <div style="font-size:11px;color:#9a9a92;margin-top:4px;">KESEHATAN</div>
                </div>
                <div class="reveal-up" style="background:var(--cream);padding:26px 22px;text-align:center;">
                    <div style="font-size:22px;font-weight:700;color:var(--teal);">{{ $ipm->indeks_daya_beli ?? '-' }}</div>
                    <div style="font-size:11px;color:#9a9a92;margin-top:4px;">DAYA BELI</div>
                </div>
            </div>
        </section>
    @endif

    {{-- Statistik Penduduk --}}
    @if ($statistik->isNotEmpty())
        <section>
            <div class="section-head reveal-up">
                <span class="eyebrow">Demografi</span>
                <h2>Statistik penduduk</h2>
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:24px;max-width:1000px;">
                @foreach ($statistik as $kategori => $rows)
                    <div class="reveal-up" style="background:var(--cream);border:1px solid rgba(29,74,67,0.08);border-radius:4px;padding:24px;">
                        <h3 style="font-size:14px;font-weight:600;color:var(--teal);margin-bottom:14px;text-transform:uppercase;letter-spacing:.4px;">{{ $kategori }}</h3>
                        @foreach ($rows->take(10) as $row)
                            <div style="display:flex;justify-content:space-between;padding:7px 0;border-bottom:1px solid rgba(29,74,67,0.06);font-size:13.5px;">
                                <span style="color:#5a5a56;">{{ $row->sub_kategori }}</span>
                                <span style="font-weight:600;color:var(--teal);">{{ number_format($row->nilai) }} {{ $row->satuan }}</span>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{-- Visi Misi --}}
    <section class="pesan" style="padding-top:100px;padding-bottom:100px;">
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:80px;max-width:1100px;margin:0 auto;position:relative;z-index:2;">
            <div class="reveal-up">
                <span class="eyebrow" style="color:var(--gold);">Visi</span>
                <p style="font-size:20px;line-height:1.6;font-style:italic;color:var(--cream);margin-top:16px;">
                    {{ $profil->visi ?? $profil->visi_misi ?? 'Mewujudkan Desa Hegarmulya yang mandiri, sejahtera, dan berkelanjutan dengan tetap menjaga kearifan lokal.' }}
                </p>
            </div>
            <div class="reveal-up">
                <span class="eyebrow" style="color:var(--gold);">Misi</span>
                <p style="font-size:15px;line-height:1.8;color:rgba(246,230,216,0.8);margin-top:16px;">
                    {{ $profil->misi ?? 'Meningkatkan kualitas infrastruktur, mendorong pertumbuhan UMKM lokal, dan memperluas akses informasi bagi seluruh warga desa.' }}
                </p>
            </div>
        </div>
    </section>

    {{-- Sejarah Kepala Desa --}}
    @if ($sejarahKades->isNotEmpty())
        <section>
            <div class="section-head reveal-up">
                <span class="eyebrow">Kepemimpinan</span>
                <h2>Sejarah kepala desa</h2>
                <p>Perjalanan kepemimpinan Desa Hegarmulya dari masa ke masa.</p>
            </div>
            <div class="reveal-up" style="max-width:800px;">
                @foreach ($sejarahKades as $kades)
                    <div style="display:flex;gap:24px;padding:22px 0;border-bottom:1px solid rgba(29,74,67,0.1);">
                        <div style="min-width:110px;font-size:13px;font-weight:600;color:var(--olive);">
                            {{ $kades->periode_mulai }}&ndash;{{ $kades->periode_selesai ?? 'Sekarang' }}
                        </div>
                        <div>
                            <h4 style="font-size:16px;font-weight:600;color:var(--teal);">{{ $kades->nama_kepala_desa }}</h4>
                            @if ($kades->status)
                                <span style="font-size:11.5px;color:var(--gold);font-weight:600;text-transform:uppercase;letter-spacing:.4px;">{{ $kades->status }}</span>
                            @endif
                            @if ($kades->pencapaian)
                                <p style="font-size:13.5px;color:#6b6b64;margin-top:6px;line-height:1.6;">{{ $kades->pencapaian }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    @if ($profil && $profil->maps_embed_url)
        <section>
            <div class="section-head reveal-up">
                <span class="eyebrow">Lokasi</span>
                <h2>Temukan kami di peta</h2>
            </div>
            <div class="reveal-up" style="aspect-ratio:16/7;border-radius:4px;overflow:hidden;">
                <iframe src="{{ $profil->maps_embed_url }}" style="width:100%;height:100%;border:0;" loading="lazy"></iframe>
            </div>
        </section>
    @endif

</x-layouts.guest-public>