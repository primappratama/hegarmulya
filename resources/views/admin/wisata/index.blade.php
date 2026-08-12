<x-app-layout>
    <x-slot name="header"><span>Potensi Wisata Desa</span></x-slot>
    @include('admin.partials.premium-grid-styles')
 
    @if (session('success'))<div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">{{ session('success') }}</div>@endif
 
    <div class="mb-5">
        <a href="{{ route('admin.wisata.create') }}" class="plist-toggle">
            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg>
            Tambah Wisata
        </a>
    </div>
 
    @forelse ($items as $kategori => $rows)
        <div class="plist-group-label">{{ $kategori }} <span class="plist-group-count">{{ $rows->count() }}</span></div>
        <div class="pgrid" style="margin-bottom:8px;">
            @foreach ($rows as $item)
                <div class="pgrid-card">
                    <div class="pgrid-photo">
                        @if ($item->foto)
                            <img src="{{ Storage::url($item->foto) }}" alt="{{ $item->nama_wisata }}">
                        @else
                            <div class="pgrid-photo-empty"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 17l6-8 4 5 3-4 5 7H3z"/><circle cx="8" cy="7" r="1.5"/></svg></div>
                        @endif
                    </div>
                    <div class="pgrid-body">
                        <div class="pgrid-title">{{ $item->nama_wisata }}</div>
                        <div class="pgrid-actions">
                            <a href="{{ route('admin.wisata.edit', $item) }}" style="color:#1D4A43;">Edit</a>
                            <form action="{{ route('admin.wisata.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                @csrf @method('DELETE')
                                <button type="submit" style="color:#c0392b;">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @empty
        <p class="text-gray-400 text-sm italic">Belum ada data wisata.</p>
    @endforelse
</x-app-layout>