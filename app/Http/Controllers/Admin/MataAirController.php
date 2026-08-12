<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MataAir;
use App\Models\Dusun;
use Illuminate\Http\Request;

class MataAirController extends Controller
{
    public function index()
    {
        $items = MataAir::with('dusun')->orderBy('dusun_id')->get()->groupBy(fn($i) => $i->dusun->nama_dusun ?? 'Tanpa Dusun');
        $dusunList = Dusun::orderBy('nama_dusun')->get();
        return view('admin.mata-air.index', compact('items', 'dusunList'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'dusun_id' => 'nullable|exists:dusun,id',
            'nama_mata_air' => 'required|string|max:255',
        ]);

        MataAir::create($validated);

        return redirect()->route('admin.mata-air.index')->with('success', 'Data mata air berhasil ditambahkan.');
    }

    public function update(Request $request, MataAir $mata_air)
    {
        $validated = $request->validate([
            'dusun_id' => 'nullable|exists:dusun,id',
            'nama_mata_air' => 'required|string|max:255',
        ]);

        $mata_air->update($validated);

        return redirect()->route('admin.mata-air.index')->with('success', 'Data mata air berhasil diperbarui.');
    }

    public function destroy(MataAir $mata_air)
    {
        $mata_air->delete();
        return redirect()->route('admin.mata-air.index')->with('success', 'Data mata air berhasil dihapus.');
    }
}