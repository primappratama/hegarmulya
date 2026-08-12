<x-app-layout>
    <x-slot name="header"><span>Data Mata Air</span></x-slot>
    @include('admin.partials.premium-list-styles')
    @if (session('success'))<div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">{{ session('success') }}</div>@endif
 
    <div x-data="{ showAdd: false }" class="mb-5">
        <button @click="showAdd = !showAdd" class="plist-toggle">
            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg>
            <span x-text="showAdd ? 'Tutup Form' : 'Tambah Mata Air'"></span>
        </button>
        <div x-show="showAdd" x-cloak x-transition class="plist-add-card mt-3">
            <form action="{{ route('admin.mata-air.store') }}" method="POST" class="grid grid-cols-3 gap-3 items-end">
                @csrf
                <div>
                    <label class="block text-xs font-medium mb-1">Dusun</label>
                    <select name="dusun_id" class="w-full rounded-lg px-3 py-2.5 text-sm">
                        <option value="">— Tanpa dusun —</option>
                        @foreach ($dusunList as $d)<option value="{{ $d->id }}">{{ $d->nama_dusun }}</option>@endforeach
                    </select>
                </div>
                <div><label class="block text-xs font-medium mb-1">Nama Mata Air</label><input type="text" name="nama_mata_air" class="w-full rounded-lg px-3 py-2.5 text-sm"></div>
                <div><button type="submit" class="bg-[#CC9966] text-[#123430] px-5 py-2.5 rounded-lg text-sm font-semibold w-full">Simpan</button></div>
            </form>
        </div>
    </div>
 
    @forelse ($items as $namaDusun => $rows)
        <div class="plist-group-label">{{ $namaDusun }} <span class="plist-group-count">{{ $rows->count() }}</span></div>
        @foreach ($rows as $item)
            <div class="plist-row" x-data="{ editing: false }">
                <div class="plist-icon"><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round"><circle cx="12" cy="12" r="4"/><path d="M12 2v4M12 18v4M2 12h4M18 12h4"/></svg></div>
                <template x-if="!editing"><div class="plist-body"><div class="plist-title">{{ $item->nama_mata_air }}</div></div></template>
                <template x-if="!editing">
                    <div class="plist-actions">
                        <button @click="editing = true" class="plist-btn"><svg viewBox="0 0 24 24" fill="none" stroke="#1D4A43" stroke-width="2"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.1 2.1 0 013 3L12 15l-4 1 1-4z"/></svg></button>
                        <form action="{{ route('admin.mata-air.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">@csrf @method('DELETE')<button type="submit" class="plist-btn danger"><svg viewBox="0 0 24 24" fill="none" stroke="#c0392b" stroke-width="2"><path d="M3 6h18M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2m3 0v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6"/></svg></button></form>
                    </div>
                </template>
                <template x-if="editing">
                    <form action="{{ route('admin.mata-air.update', $item) }}" method="POST" class="flex-1 flex items-center gap-2">
                        @csrf @method('PUT')
                        <select name="dusun_id" class="rounded-lg border-gray-200 shadow-sm text-sm">
                            <option value="">— Tanpa dusun —</option>
                            @foreach ($dusunList as $d)<option value="{{ $d->id }}" {{ $item->dusun_id==$d->id?'selected':'' }}>{{ $d->nama_dusun }}</option>@endforeach
                        </select>
                        <input type="text" name="nama_mata_air" value="{{ $item->nama_mata_air }}" class="rounded-lg border-gray-200 shadow-sm text-sm flex-1">
                        <button type="submit" class="plist-btn"><svg viewBox="0 0 24 24" fill="none" stroke="#2e7d4f" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg></button>
                        <button type="button" @click="editing=false" class="plist-btn"><svg viewBox="0 0 24 24" fill="none" stroke="#8a8a82" stroke-width="2"><path d="M18 6L6 18M6 6l12 12"/></svg></button>
                    </form>
                </template>
            </div>
        @endforeach
    @empty
        <p class="text-gray-400 text-sm italic">Belum ada data mata air.</p>
    @endforelse
</x-app-layout>