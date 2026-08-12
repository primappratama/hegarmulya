<x-app-layout>
    <x-slot name="header"><span>Kelola Berita</span></x-slot>
    @include('admin.partials.premium-list-styles')

    @if (session('success'))<div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">{{ session('success') }}</div>@endif

    <div class="mb-5">
        <a href="{{ route('admin.berita.create') }}" class="plist-toggle">
            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg>
            Tambah Berita
        </a>
    </div>

    @forelse ($beritas as $berita)
        <div class="plist-row">
            <div style="width:64px;height:64px;border-radius:8px;overflow:hidden;background:#F6E6D8;flex-shrink:0;display:flex;align-items:center;justify-content:center;">
                @if ($berita->foto)
                    <img src="{{ Storage::url($berita->foto) }}" style="width:100%;height:100%;object-fit:cover;">
                @else
                    <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="#CC9966" stroke-width="1.8"><rect x="4" y="4" width="16" height="16" rx="1"/><path d="M8 9h8M8 13h8M8 17h4"/></svg>
                @endif
            </div>
            <div class="plist-body">
                <div class="plist-title">{{ $berita->judul }}</div>
                <div class="plist-sub">{{ $berita->tanggal->translatedFormat('d F Y') }}</div>
            </div>
            <div class="plist-actions" style="opacity:1;">
                <a href="{{ route('admin.berita.edit', $berita) }}" class="plist-btn"><svg viewBox="0 0 24 24" fill="none" stroke="#1D4A43" stroke-width="2"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.1 2.1 0 013 3L12 15l-4 1 1-4z"/></svg></a>
                <form action="{{ route('admin.berita.destroy', $berita) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="plist-btn danger"><svg viewBox="0 0 24 24" fill="none" stroke="#c0392b" stroke-width="2"><path d="M3 6h18M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2m3 0v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6"/></svg></button>
                </form>
            </div>
        </div>
    @empty
        <p class="text-gray-400 text-sm italic">Belum ada berita.</p>
    @endforelse

    <div class="mt-6">{{ $beritas->links() }}</div>
</x-app-layout>