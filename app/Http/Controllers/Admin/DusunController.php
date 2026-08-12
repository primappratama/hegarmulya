<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dusun;
use Illuminate\Http\Request;

class DusunController extends Controller
{
    public function index()
    {
        $items = Dusun::orderBy('nama_dusun')->get();
        return view('admin.dusun.index', compact('items'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_dusun' => 'required|string|max:255',
            'arah' => 'nullable|string|max:100',
            'luas_ha' => 'nullable|numeric',
            'jumlah_rt' => 'nullable|integer',
        ]);

        Dusun::create($validated);

        return redirect()->route('admin.dusun.index')->with('success', 'Data dusun berhasil ditambahkan.');
    }

    public function update(Request $request, Dusun $dusun)
    {
        $validated = $request->validate([
            'nama_dusun' => 'required|string|max:255',
            'arah' => 'nullable|string|max:100',
            'luas_ha' => 'nullable|numeric',
            'jumlah_rt' => 'nullable|integer',
        ]);

        $dusun->update($validated);

        return redirect()->route('admin.dusun.index')->with('success', 'Data dusun berhasil diperbarui.');
    }

    public function destroy(Dusun $dusun)
    {
        $dusun->delete();
        return redirect()->route('admin.dusun.index')->with('success', 'Data dusun berhasil dihapus.');
    }
}