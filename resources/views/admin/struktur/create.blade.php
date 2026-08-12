<x-app-layout>
    <x-slot name="header"><span>Tambah Jabatan</span></x-slot>
    @include('admin.partials.premium-form-styles')
 
    <div class="pform-wrap">
        <div class="pform-card">
            <div class="pform-header">
                <div class="pform-header-icon"><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round"><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4 4-6 8-6s8 2 8 6"/></svg></div>
                <div><div class="pform-header-title">Jabatan Baru</div><div class="pform-header-sub">Struktur pemerintahan desa</div></div>
            </div>
            <div class="pform-body">
                <form action="{{ route('admin.struktur.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="pform-field">
                        <label class="pform-label">Induk Jabatan (opsional)</label>
                        <select name="parent_id">
                            <option value="">— Tidak ada (jabatan tertinggi) —</option>
                            @foreach ($parents as $p)<option value="{{ $p->id }}">{{ $p->nama }} ({{ $p->jabatan }})</option>@endforeach
                        </select>
                        <div class="pform-hint">Kosongkan jika ini jabatan paling atas struktur.</div>
                    </div>
                    <div class="pform-field"><label class="pform-label">Nama</label><input type="text" name="nama" value="{{ old('nama') }}" class="pform-input">@error('nama')<div class="pform-error">{{ $message }}</div>@enderror</div>
                    <div class="pform-field"><label class="pform-label">Jabatan</label><input type="text" name="jabatan" value="{{ old('jabatan') }}" placeholder="mis. Kepala Desa" class="pform-input">@error('jabatan')<div class="pform-error">{{ $message }}</div>@enderror</div>
                    <div class="pform-field"><label class="pform-label">Urutan (opsional)</label><input type="number" name="urutan" value="{{ old('urutan', 0) }}" class="pform-input"></div>
                    <div class="pform-field">
                        <label class="pform-photo">
                            <input type="file" name="foto" accept="image/*">
                            <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="9" cy="9" r="2"/><path d="M21 15l-5-5L5 21"/></svg>
                            <div class="pform-photo-text">Klik untuk unggah foto (opsional)</div>
                        </label>
                    </div>
                    <div class="pform-actions">
                        <button type="submit" class="pform-submit">Simpan</button>
                        <a href="{{ route('admin.struktur.index') }}" class="pform-cancel">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>