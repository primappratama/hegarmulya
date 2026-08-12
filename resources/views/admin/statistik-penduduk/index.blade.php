<x-app-layout>
    <x-slot name="header">
        <span>Statistik Penduduk</span>
    </x-slot>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
    @endif

    <div x-data="{ showAdd: false }" class="mb-4">
        <button @click="showAdd = !showAdd" class="bg-[#1D4A43] text-white px-4 py-2 rounded hover:bg-[#153732] text-sm font-medium">
            <span x-text="showAdd ? '− Tutup Form' : '+ Tambah Data'"></span>
        </button>

        <div x-show="showAdd" x-cloak class="bg-white shadow rounded-lg p-6 mt-3">
            <form action="{{ route('admin.statistik-penduduk.store') }}" method="POST" class="grid grid-cols-5 gap-3 items-end">
                @csrf
                <div>
                    <label class="block text-xs font-medium text-gray-700">Tahun</label>
                    <input type="number" name="tahun" value="{{ date('Y') }}" class="mt-1 block w-full rounded border-gray-300 shadow-sm text-sm">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-700">Kategori</label>
                    <input type="text" name="kategori" placeholder="mis. Usia" class="mt-1 block w-full rounded border-gray-300 shadow-sm text-sm">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-700">Sub Kategori</label>
                    <input type="text" name="sub_kategori" placeholder="mis. 20-30 Tahun" class="mt-1 block w-full rounded border-gray-300 shadow-sm text-sm">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-700">Nilai</label>
                    <input type="number" name="nilai" class="mt-1 block w-full rounded border-gray-300 shadow-sm text-sm">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-700">Satuan</label>
                    <input type="text" name="satuan" value="orang" class="mt-1 block w-full rounded border-gray-300 shadow-sm text-sm">
                </div>
                <div class="col-span-5">
                    <button type="submit" class="bg-[#1D4A43] text-white px-4 py-2 rounded text-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    @forelse ($items as $kategori => $rows)
        <div class="bg-white shadow rounded-lg overflow-hidden mb-4">
            <div class="bg-[#1D4A43] text-white px-4 py-2 text-sm font-semibold">{{ $kategori }}</div>
            <table class="w-full text-sm text-left">
                <tbody>
                    @foreach ($rows as $item)
                        <tr class="border-t" x-data="{ editing: false }">
                            <td class="px-4 py-2" colspan="4" x-show="!editing">
                                <div class="grid grid-cols-4 gap-2 items-center">
                                    <span>{{ $item->sub_kategori }}</span>
                                    <span class="font-medium">{{ number_format($item->nilai) }} {{ $item->satuan }}</span>
                                    <span class="text-gray-400">{{ $item->tahun }}</span>
                                    <span class="space-x-2">
                                        <button @click="editing = true" class="text-blue-600 hover:underline">Edit</button>
                                        <form action="{{ route('admin.statistik-penduduk.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                        </form>
                                    </span>
                                </div>
                            </td>
                            <td class="px-4 py-2" colspan="4" x-show="editing" x-cloak>
                                <form action="{{ route('admin.statistik-penduduk.update', $item) }}" method="POST" class="grid grid-cols-4 gap-2 items-center">
                                    @csrf @method('PUT')
                                    <input type="hidden" name="kategori" value="{{ $item->kategori }}">
                                    <input type="text" name="sub_kategori" value="{{ $item->sub_kategori }}" class="rounded border-gray-300 shadow-sm text-sm">
                                    <input type="number" name="nilai" value="{{ $item->nilai }}" class="rounded border-gray-300 shadow-sm text-sm">
                                    <input type="number" name="tahun" value="{{ $item->tahun }}" class="rounded border-gray-300 shadow-sm text-sm">
                                    <span class="space-x-2">
                                        <button type="submit" class="text-green-600 hover:underline">Simpan</button>
                                        <button type="button" @click="editing = false" class="text-gray-500 hover:underline">Batal</button>
                                    </span>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @empty
        <p class="text-gray-400 text-sm">Belum ada data statistik.</p>
    @endforelse
</x-app-layout>