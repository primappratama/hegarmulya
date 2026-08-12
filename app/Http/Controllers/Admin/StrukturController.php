<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StrukturPemerintahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturController extends Controller
{
    public function index()
    {
        $struktur = StrukturPemerintahan::whereNull('parent_id')
            ->with('children.children')
            ->orderBy('urutan')
            ->get();

        return view('admin.struktur.index', compact('struktur'));
    }

    public function create()
    {
        $parents = StrukturPemerintahan::orderBy('urutan')->get();
        return view('admin.struktur.create', compact('parents'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'parent_id' => 'nullable|exists:struktur_pemerintahans,id',
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'urutan' => 'nullable|integer',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('struktur', 'public');
        }

        StrukturPemerintahan::create($validated);

        return redirect()->route('admin.struktur.index')->with('success', 'Data struktur berhasil ditambahkan.');
    }

    public function edit(StrukturPemerintahan $struktur)
    {
        $parents = StrukturPemerintahan::where('id', '!=', $struktur->id)->orderBy('urutan')->get();
        return view('admin.struktur.edit', compact('struktur', 'parents'));
    }

    public function update(Request $request, StrukturPemerintahan $struktur)
    {
        $validated = $request->validate([
            'parent_id' => 'nullable|exists:struktur_pemerintahans,id',
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'urutan' => 'nullable|integer',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($struktur->foto) {
                Storage::disk('public')->delete($struktur->foto);
            }
            $validated['foto'] = $request->file('foto')->store('struktur', 'public');
        }

        $struktur->update($validated);

        return redirect()->route('admin.struktur.index')->with('success', 'Data struktur berhasil diperbarui.');
    }

    public function destroy(StrukturPemerintahan $struktur)
    {
        if ($struktur->foto) {
            Storage::disk('public')->delete($struktur->foto);
        }
        $struktur->delete();

        return redirect()->route('admin.struktur.index')->with('success', 'Data struktur berhasil dihapus.');
    }
}