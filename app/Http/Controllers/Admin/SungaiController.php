<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sungai;
use Illuminate\Http\Request;

class SungaiController extends Controller
{
    public function index()
    {
        $items = Sungai::orderBy('nama_sungai')->get();
        return view('admin.sungai.index', compact('items'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_sungai' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        Sungai::create($validated);

        return redirect()->route('admin.sungai.index')->with('success', 'Data sungai berhasil ditambahkan.');
    }

    public function update(Request $request, Sungai $sungai)
    {
        $validated = $request->validate([
            'nama_sungai' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $sungai->update($validated);

        return redirect()->route('admin.sungai.index')->with('success', 'Data sungai berhasil diperbarui.');
    }

    public function destroy(Sungai $sungai)
    {
        $sungai->delete();
        return redirect()->route('admin.sungai.index')->with('success', 'Data sungai berhasil dihapus.');
    }
}