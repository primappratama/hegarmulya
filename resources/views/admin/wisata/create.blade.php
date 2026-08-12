<x-app-layout>
    <x-slot name="header"><span>Tambah Wisata</span></x-slot>
    @include('admin.partials.premium-form-styles')
 
    <div class="pform-wrap">
        <div class="pform-card">
            <div class="pform-header">
                <div class="pform-header-icon"><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round"><path d="M3 17l6-8 4 5 3-4 5 7H3z"/><circle cx="8" cy="7" r="1.5"/></svg></div>
                <div><div class="pform-header-title">Wisata Baru</div><div class="pform-header-sub">Potensi wisata desa</div></div>
            </div>
            <div class="pform-body">
                <form action="{{ route('admin.wisata.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="pform-field">
                        <label class="pform-photo">
                            <input type="file" name="foto" accept="image/*">
                            <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="9" cy="9" r="2"/><path d="M21 15l-5-5L5 21"/></svg>
                            <div class="pform-photo-text">Klik untuk unggah foto (opsional)</div>
                        </label>
                    </div>
                    <div class="pform-field"><label class="pform-label">Nama Wisata</label><input type="text" name="nama_wisata" value="{{ old('nama_wisata') }}" placeholder="mis. Curug Cijengkol" class="pform-input">@error('nama_wisata')<div class="pform-error">{{ $message }}</div>@enderror</div>
                    <div class="pform-field">
                        <label class="pform-label">Kategori</label>
                        <select name="kategori"><option>Curug</option><option>Gua</option><option>Lainnya</option></select>
                    </div>
                    <div class="pform-field"><label class="pform-label">Keterangan (opsional)</label><textarea name="keterangan" rows="3" class="pform-input"></textarea></div>
                    <div class="pform-actions">
                        <button type="submit" class="pform-submit">Simpan</button>
                        <a href="{{ route('admin.wisata.index') }}" class="pform-cancel">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>