<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Foto Galeri</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">
                <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Judul (opsional)</label>
                        <input type="text" name="judul" value="{{ old('judul') }}" class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Kategori (opsional)</label>
                        <input type="text" name="kategori" value="{{ old('kategori') }}" placeholder="mis. Alam, Kegiatan, Warga" class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Foto</label>
                        <input type="file" name="foto" accept="image/*" class="mt-1 block w-full">
                        @error('foto') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex gap-3 pt-4">
                        <button type="submit" class="bg-[#1D4A43] text-white px-5 py-2 rounded hover:bg-[#153732]">Simpan</button>
                        <a href="{{ route('admin.galeri.index') }}" class="px-5 py-2 rounded border border-gray-300 text-gray-600">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>