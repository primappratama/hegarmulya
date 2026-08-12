<x-app-layout>
    <x-slot name="header"><span>Pesan &amp; Kesan</span></x-slot>
    @include('admin.partials.premium-list-styles')
 
    @if (session('success'))<div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">{{ session('success') }}</div>@endif
 
    <div class="mb-5">
        <a href="{{ route('admin.pesan-kesan.create') }}" class="plist-toggle">
            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg>
            Tambah Pesan &amp; Kesan
        </a>
    </div>
 
    @forelse ($pesanKesans as $pk)
        <div class="plist-row" style="align-items:flex-start;">
            <div class="plist-icon" style="background:{{ $pk->tampilkan ? '#F6E6D8' : '#f3f3f1' }};">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
            </div>
            <div class="plist-body">
                <div style="display:flex;align-items:center;gap:8px;">
                    <div class="plist-title">{{ $pk->judul ?? 'Tanpa judul' }}</div>
                    @if ($pk->tampilkan)
                        <span style="font-size:10px;font-weight:700;background:#e6f4ea;color:#2e7d4f;padding:2px 8px;border-radius:20px;">TAMPIL</span>
                    @else
                        <span style="font-size:10px;font-weight:700;background:#f3f3f1;color:#9a9a92;padding:2px 8px;border-radius:20px;">TERSEMBUNYI</span>
                    @endif
                </div>
                <div class="plist-sub">{{ Str::limit($pk->narasi, 130) }}</div>
                <div class="plist-sub" style="color:#669966;">{{ $pk->nama_penulis }}</div>
            </div>
            <div class="plist-actions" style="opacity:1;">
                <a href="{{ route('admin.pesan-kesan.edit', $pk) }}" class="plist-btn"><svg viewBox="0 0 24 24" fill="none" stroke="#1D4A43" stroke-width="2"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.1 2.1 0 013 3L12 15l-4 1 1-4z"/></svg></a>
                <form action="{{ route('admin.pesan-kesan.destroy', $pk) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="plist-btn danger"><svg viewBox="0 0 24 24" fill="none" stroke="#c0392b" stroke-width="2"><path d="M3 6h18M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2m3 0v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6"/></svg></button>
                </form>
            </div>
        </div>
    @empty
        <p class="text-gray-400 text-sm italic">Belum ada pesan &amp; kesan.</p>
    @endforelse
 
    <div class="mt-6">{{ $pesanKesans->links() }}</div>
</x-app-layout>