<x-layouts.guest-public>

    <section style="padding-top:160px;padding-bottom:100px;background:var(--teal-deep);">
        <div style="max-width:640px;">
            <span class="eyebrow" style="color:var(--gold);">Hubungi Kami</span>
            <h2 style="font-size:clamp(28px,4.5vw,52px);font-weight:600;letter-spacing:-.02em;line-height:1.15;color:var(--cream);">Mari terhubung</h2>
            <p style="margin-top:18px;font-size:16px;line-height:1.7;color:rgba(246,230,216,0.75);max-width:520px;">
                Punya pertanyaan, masukan, atau ingin bekerja sama dengan Desa Hegarmulya? Kami terbuka untuk siapa saja.
            </p>
        </div>
    </section>

    <section style="padding-top:80px;">
        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:1px;background:rgba(29,74,67,0.1);max-width:1000px;">
            <div class="reveal-up" style="background:var(--cream);padding:36px 28px;">
                <span class="eyebrow">Alamat</span>
                <p style="font-size:15px;line-height:1.7;color:#4a4a46;margin-top:10px;">
                    Kantor Desa Hegarmulya<br>
                    {{ $profil->kecamatan ?? 'Kecamatan Cidadap' }}, {{ $profil->kabupaten ?? 'Kabupaten Sukabumi' }}<br>
                    {{ $profil->provinsi ?? 'Jawa Barat' }}
                </p>
            </div>
            <div class="reveal-up" style="background:var(--cream);padding:36px 28px;">
                <span class="eyebrow">Media Sosial</span>
                <p style="font-size:15px;line-height:1.7;color:#4a4a46;margin-top:10px;">
                    Instagram: @kkn10hegarmulya2026<br>
                    TikTok: @kkn_10.hegarmulya_
                </p>
            </div>
            <div class="reveal-up" style="background:var(--cream);padding:36px 28px;">
                <span class="eyebrow">Jam Layanan</span>
                <p style="font-size:15px;line-height:1.7;color:#4a4a46;margin-top:10px;">
                    Senin &ndash; Jumat<br>
                    08.00 &ndash; 15.00 WIB
                </p>
            </div>
        </div>
    </section>

</x-layouts.guest-public>