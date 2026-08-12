<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Berita</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">
                <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Judul</label>
                        <input type="text" name="judul" value="{{ old('judul') }}" class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                        @error('judul') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tanggal</label>
                        <input type="date" name="tanggal" value="{{ old('tanggal') }}" class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                        @error('tanggal') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Konten</label>
                        <textarea name="konten" rows="8" class="mt-1 block w-full rounded border-gray-300 shadow-sm">{{ old('konten') }}</textarea>
                        @error('konten') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Foto (opsional)</label>
                        <input type="file" name="foto" accept="image/*" class="mt-1 block w-full">
                        @error('foto') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex gap-3 pt-4">
                        <button type="submit" class="bg-[#1D4A43] text-white px-5 py-2 rounded hover:bg-[#153732]">Simpan</button>
                        <a href="{{ route('admin.berita.index') }}" class="px-5 py-2 rounded border border-gray-300 text-gray-600">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>