<x-app-layout>
    <x-slot name="header"><span>Tambah Pesan &amp; Kesan</span></x-slot>
    @include('admin.partials.premium-form-styles')
 
    <div class="pform-wrap">
        <div class="pform-card">
            <div class="pform-header">
                <div class="pform-header-icon"><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg></div>
                <div><div class="pform-header-title">Pesan &amp; Kesan Baru</div><div class="pform-header-sub">Narasi storytelling desa</div></div>
            </div>
            <div class="pform-body">
                <form action="{{ route('admin.pesan-kesan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="pform-field"><label class="pform-label">Judul (opsional)</label><input type="text" name="judul" value="{{ old('judul') }}" placeholder="mis. Pesan dari Hegarmulya" class="pform-input"></div>
                    <div class="pform-field"><label class="pform-label">Narasi</label><textarea name="narasi" rows="8" class="pform-input" placeholder="Tulis cerita/kondisi desa secara jujur di sini...">{{ old('narasi') }}</textarea>@error('narasi')<div class="pform-error">{{ $message }}</div>@enderror</div>
                    <div class="pform-field"><label class="pform-label">Nama Penulis (opsional)</label><input type="text" name="nama_penulis" value="{{ old('nama_penulis', 'Tim KKN Kelompok 10') }}" class="pform-input"></div>
                    <div class="pform-field"><label class="pform-label">Urutan</label><input type="number" name="urutan" value="{{ old('urutan', 0) }}" class="pform-input"></div>
                    <div class="pform-field">
                        <label class="pform-photo">
                            <input type="file" name="foto" accept="image/*">
                            <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="9" cy="9" r="2"/><path d="M21 15l-5-5L5 21"/></svg>
                            <div class="pform-photo-text">Klik untuk unggah foto (opsional)</div>
                        </label>
                    </div>
                    <div class="pform-field" style="display:flex;align-items:center;gap:8px;">
                        <input type="checkbox" name="tampilkan" id="tampilkan" value="1" checked style="width:16px;height:16px;accent-color:#1D4A43;">
                        <label for="tampilkan" style="font-size:13px;color:#5a5a56;">Tampilkan di halaman publik</label>
                    </div>
                    <div class="pform-actions">
                        <button type="submit" class="pform-submit">Simpan</button>
                        <a href="{{ route('admin.pesan-kesan.index') }}" class="pform-cancel">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>