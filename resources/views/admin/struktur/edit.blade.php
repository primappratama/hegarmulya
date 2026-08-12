<x-app-layout>
    <x-slot name="header"><span>Edit Jabatan</span></x-slot>
    @include('admin.partials.premium-form-styles')
 
    <div class="pform-wrap">
        <div class="pform-card">
            <div class="pform-header">
                <div class="pform-header-icon"><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round"><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4 4-6 8-6s8 2 8 6"/></svg></div>
                <div><div class="pform-header-title">{{ $struktur->nama }}</div><div class="pform-header-sub">Edit jabatan</div></div>
            </div>
            <div class="pform-body">
                @if ($struktur->foto)<img src="{{ Storage::url($struktur->foto) }}" class="pform-preview" style="border-radius:50%;width:80px;height:80px;object-fit:cover;">@endif
                <form action="{{ route('admin.struktur.update', $struktur) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="pform-field">
                        <label class="pform-label">Induk Jabatan (opsional)</label>
                        <select name="parent_id">
                            <option value="">— Tidak ada (jabatan tertinggi) —</option>
                            @foreach ($parents as $p)<option value="{{ $p->id }}" {{ old('parent_id', $struktur->parent_id)==$p->id?'selected':'' }}>{{ $p->nama }} ({{ $p->jabatan }})</option>@endforeach
                        </select>
                    </div>
                    <div class="pform-field"><label class="pform-label">Nama</label><input type="text" name="nama" value="{{ old('nama', $struktur->nama) }}" class="pform-input"></div>
                    <div class="pform-field"><label class="pform-label">Jabatan</label><input type="text" name="jabatan" value="{{ old('jabatan', $struktur->jabatan) }}" class="pform-input"></div>
                    <div class="pform-field"><label class="pform-label">Urutan</label><input type="number" name="urutan" value="{{ old('urutan', $struktur->urutan) }}" class="pform-input"></div>
                    <div class="pform-field">
                        <label class="pform-photo">
                            <input type="file" name="foto" accept="image/*">
                            <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="9" cy="9" r="2"/><path d="M21 15l-5-5L5 21"/></svg>
                            <div class="pform-photo-text">Klik untuk ganti foto (opsional)</div>
                        </label>
                    </div>
                    <div class="pform-actions">
                        <button type="submit" class="pform-submit">Update</button>
                        <a href="{{ route('admin.struktur.index') }}" class="pform-cancel">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>