<x-app-layout>
    <x-slot name="header"><span>Kelola Galeri</span></x-slot>
    @include('admin.partials.premium-grid-styles')
 
    @if (session('success'))<div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">{{ session('success') }}</div>@endif
 
    <div class="mb-5">
        <a href="{{ route('admin.galeri.create') }}" class="plist-toggle">
            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg>
            Tambah Foto
        </a>
    </div>
 
    <div class="pgrid">
        @forelse ($galeris as $foto)
            <div class="pgrid-card">
                <div class="pgrid-photo">
                    <img src="{{ Storage::url($foto->foto) }}" alt="{{ $foto->judul ?? 'Galeri' }}">
                </div>
                <div class="pgrid-body">
                    @if ($foto->kategori)<span class="pgrid-tag">{{ $foto->kategori }}</span>@endif
                    <div class="pgrid-title">{{ $foto->judul ?? 'Tanpa judul' }}</div>
                    <div class="pgrid-actions" style="justify-content:flex-end;">
                        <form action="{{ route('admin.galeri.destroy', $foto) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                            @csrf @method('DELETE')
                            <button type="submit" style="color:#c0392b;">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-gray-400 text-sm italic col-span-4">Belum ada foto.</p>
        @endforelse
    </div>
 
    <div class="mt-6">{{ $galeris->links() }}</div>
</x-app-layout>