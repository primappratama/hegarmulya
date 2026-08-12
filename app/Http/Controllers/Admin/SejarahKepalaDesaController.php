<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SejarahKepalaDesa;
use Illuminate\Http\Request;

class SejarahKepalaDesaController extends Controller
{
    public function index()
    {
        $items = SejarahKepalaDesa::orderBy('periode_mulai')->get();
        return view('admin.sejarah-kepala-desa.index', compact('items'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'periode_mulai' => 'required|integer',
            'periode_selesai' => 'nullable|integer',
            'nama_kepala_desa' => 'required|string|max:255',
            'status' => 'nullable|string|max:100',
            'pencapaian' => 'nullable|string',
        ]);

        SejarahKepalaDesa::create($validated);

        return redirect()->route('admin.sejarah-kepala-desa.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, SejarahKepalaDesa $sejarah_kepala_desa)
    {
        $validated = $request->validate([
            'periode_mulai' => 'required|integer',
            'periode_selesai' => 'nullable|integer',
            'nama_kepala_desa' => 'required|string|max:255',
            'status' => 'nullable|string|max:100',
            'pencapaian' => 'nullable|string',
        ]);

        $sejarah_kepala_desa->update($validated);

        return redirect()->route('admin.sejarah-kepala-desa.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(SejarahKepalaDesa $sejarah_kepala_desa)
    {
        $sejarah_kepala_desa->delete();
        return redirect()->route('admin.sejarah-kepala-desa.index')->with('success', 'Data berhasil dihapus.');
    }
}