<x-app-layout>
    <x-slot name="header"><span>Edit UMKM</span></x-slot>
    @include('admin.partials.premium-form-styles')
 
    <div class="pform-wrap">
        <div class="pform-card">
            <div class="pform-header">
                <div class="pform-header-icon"><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round"><path d="M3 9l1.5-5h15L21 9"/><path d="M3 9h18v10a1 1 0 01-1 1H4a1 1 0 01-1-1V9z"/><path d="M9 13a3 3 0 006 0"/></svg></div>
                <div>
                    <div class="pform-header-title">{{ $umkm->nama_usaha }}</div>
                    <div class="pform-header-sub">Edit data UMKM</div>
                </div>
            </div>
            <div class="pform-body">
                @if ($umkm->foto)<img src="{{ Storage::url($umkm->foto) }}" class="pform-preview">@endif
                <form action="{{ route('admin.umkm.update', $umkm) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="pform-field">
                        <label class="pform-photo">
                            <input type="file" name="foto" accept="image/*">
                            <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="9" cy="9" r="2"/><path d="M21 15l-5-5L5 21"/></svg>
                            <div class="pform-photo-text">Klik untuk ganti foto (opsional)</div>
                        </label>
                    </div>
                    <div class="pform-field"><label class="pform-label">Nama Usaha</label><input type="text" name="nama_usaha" value="{{ old('nama_usaha', $umkm->nama_usaha) }}" class="pform-input"></div>
                    <div class="pform-field"><label class="pform-label">Nama Pemilik</label><input type="text" name="nama_pemilik" value="{{ old('nama_pemilik', $umkm->nama_pemilik) }}" class="pform-input"></div>
                    <div class="pform-field"><label class="pform-label">Kategori</label><input type="text" name="kategori" value="{{ old('kategori', $umkm->kategori) }}" class="pform-input"></div>
                    <div class="pform-field"><label class="pform-label">Deskripsi</label><textarea name="deskripsi" rows="3" class="pform-input">{{ old('deskripsi', $umkm->deskripsi) }}</textarea></div>
                    <div class="pform-grid-2">
                        <div class="pform-field"><label class="pform-label">Kontak</label><input type="text" name="kontak" value="{{ old('kontak', $umkm->kontak) }}" class="pform-input"></div>
                        <div class="pform-field"><label class="pform-label">Alamat</label><input type="text" name="alamat" value="{{ old('alamat', $umkm->alamat) }}" class="pform-input"></div>
                    </div>
                    <div class="pform-actions">
                        <button type="submit" class="pform-submit">Update</button>
                        <a href="{{ route('admin.umkm.index') }}" class="pform-cancel">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>