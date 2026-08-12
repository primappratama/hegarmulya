<x-app-layout>
    <x-slot name="header"><span>Data Irigasi</span></x-slot>
    @include('admin.partials.premium-list-styles')
    @if (session('success'))<div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">{{ session('success') }}</div>@endif
    <div x-data="{ showAdd: false }" class="mb-5">
        <button @click="showAdd = !showAdd" class="plist-toggle">
            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg>
            <span x-text="showAdd ? 'Tutup Form' : 'Tambah Irigasi'"></span>
        </button>
        <div x-show="showAdd" x-cloak x-transition class="plist-add-card mt-3">
            <form action="{{ route('admin.irigasi.store') }}" method="POST" class="space-y-3">
                @csrf
                <div><label class="block text-xs font-medium mb-1">Jenis Pengairan</label><input type="text" name="jenis_pengairan" class="w-full rounded-lg px-3 py-2.5 text-sm"></div>
                <div class="grid grid-cols-2 gap-3">
                    <div><label class="block text-xs font-medium mb-1">Jumlah Titik</label><input type="number" name="jumlah" class="w-full rounded-lg px-3 py-2.5 text-sm"></div>
                    <div><label class="block text-xs font-medium mb-1">Kondisi</label><input type="text" name="kondisi" class="w-full rounded-lg px-3 py-2.5 text-sm"></div>
                </div>
                <div><label class="block text-xs font-medium mb-1">Keterangan</label><textarea name="keterangan" rows="2" class="w-full rounded-lg px-3 py-2.5 text-sm"></textarea></div>
                <button type="submit" class="bg-[#CC9966] text-[#123430] px-5 py-2 rounded-lg text-sm font-semibold">Simpan</button>
            </form>
        </div>
    </div>
    @forelse ($items as $item)
        <div class="plist-row" x-data="{ editing: false }" style="align-items:flex-start;">
            <div class="plist-icon"><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round"><path d="M12 2c3 4 6 7 6 11a6 6 0 01-12 0c0-4 3-7 6-11z"/></svg></div>
            <template x-if="!editing">
                <div class="plist-body">
                    <div class="plist-title">{{ $item->jenis_pengairan }}</div>
                    <div class="plist-sub">{{ $item->jumlah ?? '-' }} titik &middot; {{ $item->kondisi }}</div>
                    @if($item->keterangan)<div class="plist-sub" style="color:#669966;">{{ $item->keterangan }}</div>@endif
                </div>
            </template>
            <template x-if="!editing">
                <div class="plist-actions">
                    <button @click="editing = true" class="plist-btn"><svg viewBox="0 0 24 24" fill="none" stroke="#1D4A43" stroke-width="2"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.1 2.1 0 013 3L12 15l-4 1 1-4z"/></svg></button>
                    <form action="{{ route('admin.irigasi.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">@csrf @method('DELETE')<button type="submit" class="plist-btn danger"><svg viewBox="0 0 24 24" fill="none" stroke="#c0392b" stroke-width="2"><path d="M3 6h18M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2m3 0v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6"/></svg></button></form>
                </div>
            </template>
            <template x-if="editing">
                <form action="{{ route('admin.irigasi.update', $item) }}" method="POST" class="flex-1 space-y-2">
                    @csrf @method('PUT')
                    <input type="text" name="jenis_pengairan" value="{{ $item->jenis_pengairan }}" class="rounded-lg border-gray-200 shadow-sm text-sm w-full">
                    <div class="flex gap-2">
                        <input type="number" name="jumlah" value="{{ $item->jumlah }}" class="rounded-lg border-gray-200 shadow-sm text-sm w-24">
                        <input type="text" name="kondisi" value="{{ $item->kondisi }}" class="rounded-lg border-gray-200 shadow-sm text-sm flex-1">
                        <button type="submit" class="plist-btn"><svg viewBox="0 0 24 24" fill="none" stroke="#2e7d4f" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg></button>
                        <button type="button" @click="editing=false" class="plist-btn"><svg viewBox="0 0 24 24" fill="none" stroke="#8a8a82" stroke-width="2"><path d="M18 6L6 18M6 6l12 12"/></svg></button>
                    </div>
                </form>
            </template>
        </div>
    @empty
        <p class="text-gray-400 text-sm italic">Belum ada data irigasi.</p>
    @endforelse
</x-app-layout>