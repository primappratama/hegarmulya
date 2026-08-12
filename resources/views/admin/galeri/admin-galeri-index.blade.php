<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Kelola Galeri</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
            @endif

            <div class="mb-4">
                <a href="{{ route('admin.galeri.create') }}" class="bg-[#1D4A43] text-white px-4 py-2 rounded hover:bg-[#153732]">
                    + Tambah Foto
                </a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @forelse ($galeris as $foto)
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <img src="{{ Storage::url($foto->foto) }}" class="w-full h-40 object-cover">
                        <div class="p-3">
                            <p class="text-sm font-medium truncate">{{ $foto->judul ?? '-' }}</p>
                            <p class="text-xs text-gray-500">{{ $foto->kategori ?? 'Tanpa kategori' }}</p>
                            <form action="{{ route('admin.galeri.destroy', $foto) }}" method="POST" onsubmit="return confirm('Yakin hapus?')" class="mt-2">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 text-xs hover:underline">Hapus</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-400 col-span-4">Belum ada foto.</p>
                @endforelse
            </div>

            <div class="mt-6">{{ $galeris->links() }}</div>
        </div>
    </div>
</x-app-layout>