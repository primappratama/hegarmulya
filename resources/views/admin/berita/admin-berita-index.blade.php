<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Kelola Berita</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
            @endif

            <div class="mb-4">
                <a href="{{ route('admin.berita.create') }}" class="bg-[#1D4A43] text-white px-4 py-2 rounded hover:bg-[#153732]">
                    + Tambah Berita
                </a>
            </div>

            <div class="bg-white shadow rounded-lg overflow-hidden">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-50 text-gray-600">
                        <tr>
                            <th class="px-4 py-3">Judul</th>
                            <th class="px-4 py-3">Tanggal</th>
                            <th class="px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($beritas as $berita)
                            <tr class="border-t">
                                <td class="px-4 py-3 font-medium">{{ $berita->judul }}</td>
                                <td class="px-4 py-3">{{ $berita->tanggal->format('d M Y') }}</td>
                                <td class="px-4 py-3 space-x-2">
                                    <a href="{{ route('admin.berita.edit', $berita) }}" class="text-blue-600 hover:underline">Edit</a>
                                    <form action="{{ route('admin.berita.destroy', $berita) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="3" class="px-4 py-6 text-center text-gray-400">Belum ada berita.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">{{ $beritas->links() }}</div>
        </div>
    </div>
</x-app-layout>