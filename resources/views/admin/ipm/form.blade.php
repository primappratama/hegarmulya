<x-app-layout>
    <x-slot name="header"><span>Indeks Pembangunan Manusia</span></x-slot>
    @include('admin.partials.premium-form-styles')

    @if (session('success'))<div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">{{ session('success') }}</div>@endif

    <div class="pform-wrap">
        <div class="pform-card">
            <div class="pform-header">
                <div class="pform-header-icon"><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round"><path d="M3 3v18h18"/><path d="M7 15l4-6 3 3 5-8"/></svg></div>
                <div><div class="pform-header-title">Data IPM</div><div class="pform-header-sub">Indeks Pembangunan Manusia</div></div>
            </div>
            <div class="pform-body">
                <form action="{{ $ipm->exists ? route('admin.ipm.update', $ipm) : route('admin.ipm.store') }}" method="POST">
                    @csrf
                    @if ($ipm->exists) @method('PUT') @endif
                    <div class="pform-field" style="max-width:200px;"><label class="pform-label">Tahun</label><input type="number" name="tahun" value="{{ old('tahun', $ipm->tahun) }}" class="pform-input"></div>
                    <div class="pform-grid-2">
                        <div class="pform-field"><label class="pform-label">Indeks Pendidikan</label><input type="number" step="0.01" name="indeks_pendidikan" value="{{ old('indeks_pendidikan', $ipm->indeks_pendidikan) }}" class="pform-input"></div>
                        <div class="pform-field"><label class="pform-label">Indeks Kesehatan</label><input type="number" step="0.01" name="indeks_kesehatan" value="{{ old('indeks_kesehatan', $ipm->indeks_kesehatan) }}" class="pform-input"></div>
                    </div>
                    <div class="pform-field"><label class="pform-label">Indeks Daya Beli</label><input type="number" step="0.01" name="indeks_daya_beli" value="{{ old('indeks_daya_beli', $ipm->indeks_daya_beli) }}" class="pform-input"></div>
                    <div class="pform-field"><label class="pform-label">Realisasi IPM</label><input type="number" step="0.01" name="realisasi_ipm" value="{{ old('realisasi_ipm', $ipm->realisasi_ipm) }}" class="pform-input"></div>
                    <div class="pform-grid-2">
                        <div class="pform-field"><label class="pform-label">Target Kecamatan</label><input type="number" step="0.01" name="target_ipm_kecamatan" value="{{ old('target_ipm_kecamatan', $ipm->target_ipm_kecamatan) }}" class="pform-input"></div>
                        <div class="pform-field"><label class="pform-label">Target Kabupaten</label><input type="number" step="0.01" name="target_ipm_kabupaten" value="{{ old('target_ipm_kabupaten', $ipm->target_ipm_kabupaten) }}" class="pform-input"></div>
                    </div>
                    <div class="pform-actions">
                        <button type="submit" class="pform-submit">{{ $ipm->exists ? 'Update' : 'Simpan' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>