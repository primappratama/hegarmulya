<x-app-layout>
    <x-slot name="header"><span>Sekolah</span></x-slot>
    @include('admin.partials.premium-list-styles')
    @if (session('success'))<div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">{{ session('success') }}</div>@endif
 
    <div x-data="{ showAdd: false }" class="mb-5">
        <button @click="showAdd = !showAdd" class="plist-toggle">
            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg>
            <span x-text="showAdd ? 'Tutup Form' : 'Tambah Sekolah'"></span>
        </button>
        <div x-show="showAdd" x-cloak x-transition class="plist-add-card mt-3">
            <form action="{{ route('admin.sekolah.store') }}" method="POST" class="grid grid-cols-3 gap-3">
                @csrf
                <div><label class="block text-xs font-medium mb-1">Nama Sekolah</label><input type="text" name="nama_sekolah" class="w-full rounded-lg px-3 py-2.5 text-sm"></div>
                <div>
                    <label class="block text-xs font-medium mb-1">Jenjang</label>
                    <select name="jenjang" class="w-full rounded-lg px-3 py-2.5 text-sm">
                        <option>PAUD</option><option>SD/MI/PA</option><option>MD</option><option>SMP/MTs/PB</option><option>SMA/MA/PC</option><option>Umum</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-medium mb-1">Status</label>
                    <select name="status" class="w-full rounded-lg px-3 py-2.5 text-sm">
                        <option value="negeri">Negeri</option><option value="swasta">Swasta</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-medium mb-1">Dusun</label>
                    <select name="dusun_id" class="w-full rounded-lg px-3 py-2.5 text-sm">
                        <option value="">— Tidak diketahui —</option>
                        @foreach ($dusunList as $d)<option value="{{ $d->id }}">{{ $d->nama_dusun }}</option>@endforeach
                    </select>
                </div>
                <div><label class="block text-xs font-medium mb-1">Jumlah Murid</label><input type="number" name="jumlah_murid" class="w-full rounded-lg px-3 py-2.5 text-sm"></div>
                <div><label class="block text-xs font-medium mb-1">Jumlah Guru</label><input type="number" name="jumlah_guru" class="w-full rounded-lg px-3 py-2.5 text-sm"></div>
                <div class="col-span-3"><button type="submit" class="bg-[#CC9966] text-[#123430] px-5 py-2 rounded-lg text-sm font-semibold">Simpan</button></div>
            </form>
        </div>
    </div>
 
    @forelse ($items as $jenjang => $rows)
        <div class="plist-group-label">{{ $jenjang }} <span class="plist-group-count">{{ $rows->count() }}</span></div>
        @foreach ($rows as $item)
            <div class="plist-row">
                <div class="plist-icon"><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round"><path d="M12 3L2 8l10 5 10-5-10-5z"/><path d="M6 10v6c0 1.5 3 3 6 3s6-1.5 6-3v-6"/></svg></div>
                <div class="plist-body">
                    <div class="plist-title">{{ $item->nama_sekolah }}</div>
                    <div class="plist-sub">{{ ucfirst($item->status) }}{{ $item->dusun ? ' · ' . $item->dusun->nama_dusun : '' }}</div>
                </div>
                <div class="plist-actions" style="opacity:1;">
                    <form action="{{ route('admin.sekolah.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="plist-btn danger"><svg viewBox="0 0 24 24" fill="none" stroke="#c0392b" stroke-width="2"><path d="M3 6h18M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2m3 0v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6"/></svg></button>
                    </form>
                </div>
            </div>
        @endforeach
    @empty
        <p class="text-gray-400 text-sm italic">Belum ada data sekolah.</p>
    @endforelse
</x-app-layout>