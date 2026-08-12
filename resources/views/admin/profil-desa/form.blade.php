<x-app-layout>
    <x-slot name="header"><span>Profil Desa</span></x-slot>
    @include('admin.partials.premium-form-styles')

    <style>
        .pform-section-label{
            font-size:11px;font-weight:700;letter-spacing:.6px;text-transform:uppercase;color:#669966;
            margin:26px 0 14px;padding-top:20px;border-top:1px solid rgba(29,74,67,0.08);
        }
        .pform-section-label:first-of-type{margin-top:0;padding-top:0;border-top:none;}
    </style>

    @if (session('success'))<div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">{{ session('success') }}</div>@endif

    <div class="pform-wrap" style="max-width:760px;">
        <div class="pform-card">
            <div class="pform-header">
                <div class="pform-header-icon"><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round"><path d="M3 21V8l9-5 9 5v13"/><path d="M9 21v-8h6v8"/></svg></div>
                <div><div class="pform-header-title">{{ $profil->nama_desa ?? 'Desa Hegarmulya' }}</div><div class="pform-header-sub">Profil lengkap desa</div></div>
            </div>
            <div class="pform-body">
                @if ($profil->foto_cover)<img src="{{ Storage::url($profil->foto_cover) }}" class="pform-preview" style="max-height:200px;">@endif

                <form action="{{ $profil->exists ? route('admin.profil-desa.update', $profil) : route('admin.profil-desa.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($profil->exists) @method('PUT') @endif

                    <div class="pform-field">
                        <label class="pform-photo">
                            <input type="file" name="foto_cover" accept="image/*">
                            <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="9" cy="9" r="2"/><path d="M21 15l-5-5L5 21"/></svg>
                            <div class="pform-photo-text">Klik untuk unggah/ganti foto cover</div>
                        </label>
                    </div>

                    <div class="pform-section-label">Identitas Desa</div>
                    <div class="pform-grid-2">
                        <div class="pform-field"><label class="pform-label">Nama Desa</label><input type="text" name="nama_desa" value="{{ old('nama_desa', $profil->nama_desa) }}" class="pform-input">@error('nama_desa')<div class="pform-error">{{ $message }}</div>@enderror</div>
                        <div class="pform-field"><label class="pform-label">Email (opsional)</label><input type="email" name="email" value="{{ old('email', $profil->email) }}" class="pform-input"></div>
                    </div>
                    <div class="pform-field"><label class="pform-label">Alamat Kantor Desa (opsional)</label><input type="text" name="alamat_kantor" value="{{ old('alamat_kantor', $profil->alamat_kantor) }}" class="pform-input"></div>
                    <div class="pform-grid-3">
                        <div class="pform-field"><label class="pform-label">Kecamatan</label><input type="text" name="kecamatan" value="{{ old('kecamatan', $profil->kecamatan) }}" class="pform-input"></div>
                        <div class="pform-field"><label class="pform-label">Kabupaten</label><input type="text" name="kabupaten" value="{{ old('kabupaten', $profil->kabupaten) }}" class="pform-input"></div>
                        <div class="pform-field"><label class="pform-label">Provinsi</label><input type="text" name="provinsi" value="{{ old('provinsi', $profil->provinsi) }}" class="pform-input"></div>
                    </div>

                    <div class="pform-section-label">Kondisi Geografis</div>
                    <div class="pform-grid-3">
                        <div class="pform-field"><label class="pform-label">Luas Wilayah (ha)</label><input type="number" step="0.01" name="luas_wilayah_ha" value="{{ old('luas_wilayah_ha', $profil->luas_wilayah_ha) }}" class="pform-input"></div>
                        <div class="pform-field"><label class="pform-label">Ketinggian Min (m)</label><input type="number" step="0.01" name="ketinggian_min_m" value="{{ old('ketinggian_min_m', $profil->ketinggian_min_m) }}" class="pform-input"></div>
                        <div class="pform-field"><label class="pform-label">Ketinggian Max (m)</label><input type="number" step="0.01" name="ketinggian_max_m" value="{{ old('ketinggian_max_m', $profil->ketinggian_max_m) }}" class="pform-input"></div>
                    </div>
                    <div class="pform-grid-2">
                        <div class="pform-field"><label class="pform-label">Topografi</label><input type="text" name="topografi" value="{{ old('topografi', $profil->topografi) }}" class="pform-input"></div>
                        <div class="pform-field"><label class="pform-label">Jenis Tanah</label><input type="text" name="jenis_tanah" value="{{ old('jenis_tanah', $profil->jenis_tanah) }}" class="pform-input"></div>
                    </div>
                    <div class="pform-grid-3">
                        <div class="pform-field"><label class="pform-label">Curah Hujan</label><input type="text" name="curah_hujan" value="{{ old('curah_hujan', $profil->curah_hujan) }}" class="pform-input"></div>
                        <div class="pform-field"><label class="pform-label">Suhu Min (&deg;C)</label><input type="number" step="0.1" name="suhu_min" value="{{ old('suhu_min', $profil->suhu_min) }}" class="pform-input"></div>
                        <div class="pform-field"><label class="pform-label">Suhu Max (&deg;C)</label><input type="number" step="0.1" name="suhu_max" value="{{ old('suhu_max', $profil->suhu_max) }}" class="pform-input"></div>
                    </div>
                    <div class="pform-field"><label class="pform-label">Kondisi Akses Jalan</label><textarea name="kondisi_akses" rows="2" class="pform-input">{{ old('kondisi_akses', $profil->kondisi_akses) }}</textarea></div>
                    <div class="pform-field"><label class="pform-label">Kondisi Sinyal</label><textarea name="kondisi_sinyal" rows="2" class="pform-input">{{ old('kondisi_sinyal', $profil->kondisi_sinyal) }}</textarea></div>
                    <div class="pform-field"><label class="pform-label">Kondisi Tempat Tinggal (opsional)</label><textarea name="kondisi_tempat_tinggal" rows="3" class="pform-input">{{ old('kondisi_tempat_tinggal', $profil->kondisi_tempat_tinggal) }}</textarea></div>

                    <div class="pform-section-label">Jarak Tempuh (km)</div>
                    <div class="pform-grid-3">
                        <div class="pform-field"><label class="pform-label">Ke Kecamatan</label><input type="number" step="0.1" name="jarak_kecamatan_km" value="{{ old('jarak_kecamatan_km', $profil->jarak_kecamatan_km) }}" class="pform-input"></div>
                        <div class="pform-field"><label class="pform-label">Ke Kabupaten</label><input type="number" step="0.1" name="jarak_kabupaten_km" value="{{ old('jarak_kabupaten_km', $profil->jarak_kabupaten_km) }}" class="pform-input"></div>
                        <div class="pform-field"><label class="pform-label">Ke Provinsi</label><input type="number" step="0.1" name="jarak_provinsi_km" value="{{ old('jarak_provinsi_km', $profil->jarak_provinsi_km) }}" class="pform-input"></div>
                    </div>
                    <div class="pform-field" style="max-width:230px;"><label class="pform-label">Ke Ibukota Negara</label><input type="number" step="0.1" name="jarak_ibukota_km" value="{{ old('jarak_ibukota_km', $profil->jarak_ibukota_km) }}" class="pform-input"></div>

                    <div class="pform-section-label">Sejarah &amp; Visi Misi</div>
                    <div class="pform-field"><label class="pform-label">Sejarah Singkat</label><textarea name="sejarah_singkat" rows="6" class="pform-input">{{ old('sejarah_singkat', $profil->sejarah_singkat) }}</textarea></div>
                    <div class="pform-grid-2">
                        <div class="pform-field"><label class="pform-label">Visi</label><textarea name="visi" rows="3" class="pform-input">{{ old('visi', $profil->visi) }}</textarea></div>
                        <div class="pform-field"><label class="pform-label">Misi</label><textarea name="misi" rows="3" class="pform-input">{{ old('misi', $profil->misi) }}</textarea></div>
                    </div>

                    <div class="pform-section-label">Peta</div>
                    <div class="pform-grid-2">
                        <div class="pform-field"><label class="pform-label">Latitude</label><input type="text" name="latitude" value="{{ old('latitude', $profil->latitude) }}" class="pform-input"></div>
                        <div class="pform-field"><label class="pform-label">Longitude</label><input type="text" name="longitude" value="{{ old('longitude', $profil->longitude) }}" class="pform-input"></div>
                    </div>
                    <div class="pform-field"><label class="pform-label">URL Google Maps Embed</label><input type="text" name="maps_embed_url" value="{{ old('maps_embed_url', $profil->maps_embed_url) }}" placeholder="https://www.google.com/maps/embed?..." class="pform-input"></div>

                    <div class="pform-actions">
                        <button type="submit" class="pform-submit">{{ $profil->exists ? 'Update Profil' : 'Simpan Profil' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>