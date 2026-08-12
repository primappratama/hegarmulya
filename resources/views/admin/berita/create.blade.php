<x-app-layout>
    <x-slot name="header"><span>Edit Berita</span></x-slot>
    @include('admin.partials.premium-form-styles')
 
    <div class="pform-wrap" style="max-width:720px;">
        <div class="pform-card">
            <div class="pform-header">
                <div class="pform-header-icon"><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round"><rect x="4" y="4" width="16" height="16" rx="1"/><path d="M8 9h8M8 13h8M8 17h4"/></svg></div>
                <div><div class="pform-header-title">{{ $berita->judul }}</div><div class="pform-header-sub">Edit berita</div></div>
            </div>
            <div class="pform-body">
                @if ($berita->foto)<img src="{{ Storage::url($berita->foto) }}" class="pform-preview">@endif
                <form action="{{ route('admin.berita.update', $berita) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="pform-field"><label class="pform-label">Judul</label><input type="text" name="judul" value="{{ old('judul', $berita->judul) }}" class="pform-input"></div>
                    <div class="pform-field"><label class="pform-label">Tanggal</label><input type="date" name="tanggal" value="{{ old('tanggal', $berita->tanggal->format('Y-m-d')) }}" class="pform-input"></div>
                    <div class="pform-field"><label class="pform-label">Konten</label><textarea name="konten" rows="8" class="pform-input">{{ old('konten', $berita->konten) }}</textarea></div>
                    <div class="pform-field">
                        <label class="pform-photo">
                            <input type="file" name="foto" accept="image/*">
                            <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="9" cy="9" r="2"/><path d="M21 15l-5-5L5 21"/></svg>
                            <div class="pform-photo-text">Klik untuk ganti foto (opsional)</div>
                        </label>
                    </div>
                    <div class="pform-actions">
                        <button type="submit" class="pform-submit">Update</button>
                        <a href="{{ route('admin.berita.index') }}" class="pform-cancel">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>