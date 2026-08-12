<x-app-layout>
    <x-slot name="header"><span>Data Dusun</span></x-slot>
    @include('admin.partials.premium-list-styles')

    @if (session('success'))<div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">{{ session('success') }}</div>@endif

    <div x-data="{ showAdd: false }" class="mb-5">
        <button @click="showAdd = !showAdd" class="plist-toggle">
            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg>
            <span x-text="showAdd ? 'Tutup Form' : 'Tambah Dusun'"></span>
        </button>
        <div x-show="showAdd" x-cloak x-transition class="plist-add-card mt-3">
            <form action="{{ route('admin.dusun.store') }}" method="POST" class="grid grid-cols-4 gap-3">
                @csrf
                <div><label class="block text-xs font-medium mb-1">Nama Dusun</label><input type="text" name="nama_dusun" class="w-full rounded-lg px-3 py-2.5 text-sm"></div>
                <div><label class="block text-xs font-medium mb-1">Arah</label><input type="text" name="arah" class="w-full rounded-lg px-3 py-2.5 text-sm"></div>
                <div><label class="block text-xs font-medium mb-1">Luas (ha)</label><input type="number" step="0.01" name="luas_ha" class="w-full rounded-lg px-3 py-2.5 text-sm"></div>
                <div><label class="block text-xs font-medium mb-1">Jumlah RT</label><input type="number" name="jumlah_rt" class="w-full rounded-lg px-3 py-2.5 text-sm"></div>
                <div class="col-span-4"><button type="submit" class="bg-[#CC9966] text-[#123430] px-5 py-2 rounded-lg text-sm font-semibold">Simpan</button></div>
            </form>
        </div>
    </div>

    @forelse ($items as $item)
        <div class="plist-row" x-data="{ editing: false }">
            <div class="plist-icon"><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round"><path d="M3 12l9-9 9 9M5 10v10h14V10"/></svg></div>
            <template x-if="!editing">
                <div class="plist-body"><div class="plist-title">{{ $item->nama_dusun }}</div><div class="plist-sub">{{ $item->arah ? 'Arah ' . $item->arah . ' · ' : '' }}{{ $item->luas_ha ? $item->luas_ha . ' ha · ' : '' }}{{ $item->jumlah_rt ? $item->jumlah_rt . ' RT' : '' }}</div></div>
            </template>
            <template x-if="!editing">
                <div class="plist-actions">
                    <button @click="editing = true" class="plist-btn"><svg viewBox="0 0 24 24" fill="none" stroke="#1D4A43" stroke-width="2"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.1 2.1 0 013 3L12 15l-4 1 1-4z"/></svg></button>
                    <form action="{{ route('admin.dusun.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">@csrf @method('DELETE')<button type="submit" class="plist-btn danger"><svg viewBox="0 0 24 24" fill="none" stroke="#c0392b" stroke-width="2"><path d="M3 6h18M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2m3 0v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6"/></svg></button></form>
                </div>
            </template>
            <template x-if="editing">
                <form action="{{ route('admin.dusun.update', $item) }}" method="POST" class="flex-1 grid grid-cols-5 gap-2 items-center">
                    @csrf @method('PUT')
                    <input type="text" name="nama_dusun" value="{{ $item->nama_dusun }}" class="rounded-lg border-gray-200 shadow-sm text-sm">
                    <input type="text" name="arah" value="{{ $item->arah }}" class="rounded-lg border-gray-200 shadow-sm text-sm">
                    <input type="number" step="0.01" name="luas_ha" value="{{ $item->luas_ha }}" class="rounded-lg border-gray-200 shadow-sm text-sm">
                    <input type="number" name="jumlah_rt" value="{{ $item->jumlah_rt }}" class="rounded-lg border-gray-200 shadow-sm text-sm">
                    <span class="flex gap-2">
                        <button type="submit" class="plist-btn"><svg viewBox="0 0 24 24" fill="none" stroke="#2e7d4f" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg></button>
                        <button type="button" @click="editing=false" class="plist-btn"><svg viewBox="0 0 24 24" fill="none" stroke="#8a8a82" stroke-width="2"><path d="M18 6L6 18M6 6l12 12"/></svg></button>
                    </span>
                </form>
            </template>
        </div>
    @empty
        <p class="text-gray-400 text-sm italic">Belum ada data dusun.</p>
    @endforelse
</x-app-layout>