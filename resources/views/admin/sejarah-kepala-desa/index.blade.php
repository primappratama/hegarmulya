<x-app-layout>
    <x-slot name="header">
        <span>Sejarah Kepala Desa</span>
    </x-slot>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
    @endif

    <div x-data="{ showAdd: false }" class="mb-4">
        <button @click="showAdd = !showAdd" class="bg-[#1D4A43] text-white px-4 py-2 rounded hover:bg-[#153732] text-sm font-medium">
            <span x-text="showAdd ? '− Tutup Form' : '+ Tambah Periode'"></span>
        </button>

        <div x-show="showAdd" x-cloak class="bg-white shadow rounded-lg p-6 mt-3 space-y-3">
            <form action="{{ route('admin.sejarah-kepala-desa.store') }}" method="POST" class="space-y-3">
                @csrf
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-medium text-gray-700">Periode Mulai</label>
                        <input type="number" name="periode_mulai" class="mt-1 block w-full rounded border-gray-300 shadow-sm text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700">Periode Selesai (kosongkan jika masih menjabat)</label>
                        <input type="number" name="periode_selesai" class="mt-1 block w-full rounded border-gray-300 shadow-sm text-sm">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-700">Nama Kepala Desa</label>
                    <input type="text" name="nama_kepala_desa" class="mt-1 block w-full rounded border-gray-300 shadow-sm text-sm">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-700">Status</label>
                    <input type="text" name="status" placeholder="definitif / pejabat" class="mt-1 block w-full rounded border-gray-300 shadow-sm text-sm">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-700">Pencapaian (opsional)</label>
                    <textarea name="pencapaian" rows="2" class="mt-1 block w-full rounded border-gray-300 shadow-sm text-sm"></textarea>
                </div>
                <button type="submit" class="bg-[#1D4A43] text-white px-4 py-2 rounded text-sm">Simpan</button>
            </form>
        </div>
    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-50 text-gray-600">
                <tr>
                    <th class="px-4 py-3">Periode</th>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                    <tr class="border-t" x-data="{ editing: false }">
                        <td class="px-4 py-3" colspan="4" x-show="!editing">
                            <div class="grid grid-cols-4 gap-2 items-center">
                                <span>{{ $item->periode_mulai }} &ndash; {{ $item->periode_selesai ?? 'sekarang' }}</span>
                                <span class="font-medium">{{ $item->nama_kepala_desa }}</span>
                                <span>{{ $item->status ?? '-' }}</span>
                                <span class="space-x-2">
                                    <button @click="editing = true" class="text-blue-600 hover:underline">Edit</button>
                                    <form action="{{ route('admin.sejarah-kepala-desa.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                    </form>
                                </span>
                            </div>
                        </td>
                        <td class="px-4 py-3" colspan="4" x-show="editing" x-cloak>
                            <form action="{{ route('admin.sejarah-kepala-desa.update', $item) }}" method="POST" class="grid grid-cols-4 gap-2 items-center">
                                @csrf @method('PUT')
                                <input type="number" name="periode_mulai" value="{{ $item->periode_mulai }}" class="rounded border-gray-300 shadow-sm text-sm">
                                <input type="text" name="nama_kepala_desa" value="{{ $item->nama_kepala_desa }}" class="rounded border-gray-300 shadow-sm text-sm">
                                <input type="text" name="status" value="{{ $item->status }}" class="rounded border-gray-300 shadow-sm text-sm">
                                <span class="space-x-2">
                                    <button type="submit" class="text-green-600 hover:underline">Simpan</button>
                                    <button type="button" @click="editing = false" class="text-gray-500 hover:underline">Batal</button>
                                </span>
                                <input type="number" name="periode_selesai" value="{{ $item->periode_selesai }}" placeholder="Selesai" class="rounded border-gray-300 shadow-sm text-sm col-span-2">
                                <textarea name="pencapaian" placeholder="Pencapaian" class="rounded border-gray-300 shadow-sm text-sm col-span-2">{{ $item->pencapaian }}</textarea>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-4 py-6 text-center text-gray-400">Belum ada data.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>