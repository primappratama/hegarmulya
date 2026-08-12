<x-app-layout>
    <x-slot name="header"><span>Kelola UMKM</span></x-slot>
    @include('admin.partials.premium-grid-styles')

    @if (session('success'))<div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">{{ session('success') }}</div>@endif

    <div class="mb-5">
        <a href="{{ route('admin.umkm.create') }}" class="plist-toggle">
            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg>
            Tambah UMKM
        </a>
    </div>

    <div class="pgrid">
        @forelse ($umkms as $umkm)
            <div class="pgrid-card">
                <div class="pgrid-photo">
                    @if ($umkm->foto)
                        <img src="{{ Storage::url($umkm->foto) }}" alt="{{ $umkm->nama_usaha }}">
                    @else
                        <div class="pgrid-photo-empty"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="9" cy="9" r="2"/><path d="M21 15l-5-5L5 21"/></svg></div>
                    @endif
                </div>
                <div class="pgrid-body">
                    @if ($umkm->kategori)<span class="pgrid-tag">{{ $umkm->kategori }}</span>@endif
                    <div class="pgrid-title">{{ $umkm->nama_usaha }}</div>
                    <div class="pgrid-sub">{{ $umkm->nama_pemilik }}</div>
                    <div class="pgrid-actions">
                        <a href="{{ route('admin.umkm.edit', $umkm) }}" style="color:#1D4A43;">Edit</a>
                        <form action="{{ route('admin.umkm.destroy', $umkm) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                            @csrf @method('DELETE')
                            <button type="submit" style="color:#c0392b;">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-gray-400 text-sm italic col-span-4">Belum ada data UMKM.</p>
        @endforelse
    </div>

    <div class="mt-6">{{ $umkms->links() }}</div>
</x-app-layout>