<x-app-layout>
    <x-slot name="header"><span>Tambah Foto Galeri</span></x-slot>
    @include('admin.partials.premium-form-styles')
 
    <div class="pform-wrap">
        <div class="pform-card">
            <div class="pform-header">
                <div class="pform-header-icon"><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round"><rect x="3" y="4" width="18" height="16" rx="2"/><circle cx="9" cy="10" r="2"/><path d="M21 16l-5.5-5.5L4 21"/></svg></div>
                <div><div class="pform-header-title">Foto Baru</div><div class="pform-header-sub">Dokumentasi desa</div></div>
            </div>
            <div class="pform-body">
                <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="pform-field">
                        <label class="pform-photo">
                            <input type="file" name="foto" accept="image/*">
                            <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="9" cy="9" r="2"/><path d="M21 15l-5-5L5 21"/></svg>
                            <div class="pform-photo-text">Klik untuk unggah foto</div>
                        </label>
                        @error('foto')<div class="pform-error">{{ $message }}</div>@enderror
                    </div>
                    <div class="pform-field"><label class="pform-label">Judul (opsional)</label><input type="text" name="judul" value="{{ old('judul') }}" class="pform-input"></div>
                    <div class="pform-field"><label class="pform-label">Kategori (opsional)</label><input type="text" name="kategori" value="{{ old('kategori') }}" placeholder="mis. Alam, Kegiatan, Warga" class="pform-input"></div>
                    <div class="pform-actions">
                        <button type="submit" class="pform-submit">Simpan</button>
                        <a href="{{ route('admin.galeri.index') }}" class="pform-cancel">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>