<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Irigasi;
use Illuminate\Http\Request;

class IrigasiController extends Controller
{
    public function index()
    {
        $items = Irigasi::orderBy('jenis_pengairan')->get();
        return view('admin.irigasi.index', compact('items'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis_pengairan' => 'required|string|max:255',
            'jumlah' => 'nullable|integer',
            'kondisi' => 'nullable|string',
            'keterangan' => 'nullable|string',
        ]);

        Irigasi::create($validated);

        return redirect()->route('admin.irigasi.index')->with('success', 'Data irigasi berhasil ditambahkan.');
    }

    public function update(Request $request, Irigasi $irigasi)
    {
        $validated = $request->validate([
            'jenis_pengairan' => 'required|string|max:255',
            'jumlah' => 'nullable|integer',
            'kondisi' => 'nullable|string',
            'keterangan' => 'nullable|string',
        ]);

        $irigasi->update($validated);

        return redirect()->route('admin.irigasi.index')->with('success', 'Data irigasi berhasil diperbarui.');
    }

    public function destroy(Irigasi $irigasi)
    {
        $irigasi->delete();
        return redirect()->route('admin.irigasi.index')->with('success', 'Data irigasi berhasil dihapus.');
    }
}