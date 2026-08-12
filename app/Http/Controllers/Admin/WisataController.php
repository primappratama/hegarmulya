<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WisataController extends Controller
{
    public function index()
    {
        $items = Wisata::orderBy('kategori')->orderBy('nama_wisata')->get()->groupBy('kategori');
        return view('admin.wisata.index', compact('items'));
    }

    public function create()
    {
        return view('admin.wisata.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_wisata' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'keterangan' => 'nullable|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('wisata', 'public');
        }

        Wisata::create($validated);

        return redirect()->route('admin.wisata.index')->with('success', 'Data wisata berhasil ditambahkan.');
    }

    public function edit(Wisata $wisata)
    {
        return view('admin.wisata.edit', ['wisata' => $wisata]);
    }

    public function update(Request $request, Wisata $wisata)
    {
        $validated = $request->validate([
            'nama_wisata' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'keterangan' => 'nullable|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($wisata->foto) {
                Storage::disk('public')->delete($wisata->foto);
            }
            $validated['foto'] = $request->file('foto')->store('wisata', 'public');
        }

        $wisata->update($validated);

        return redirect()->route('admin.wisata.index')->with('success', 'Data wisata berhasil diperbarui.');
    }

    public function destroy(Wisata $wisata)
    {
        if ($wisata->foto) {
            Storage::disk('public')->delete($wisata->foto);
        }
        $wisata->delete();

        return redirect()->route('admin.wisata.index')->with('success', 'Data wisata berhasil dihapus.');
    }
}