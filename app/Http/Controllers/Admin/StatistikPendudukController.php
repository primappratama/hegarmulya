<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StatistikPenduduk;
use Illuminate\Http\Request;

class StatistikPendudukController extends Controller
{
    public function index()
    {
        $items = StatistikPenduduk::orderBy('tahun', 'desc')->orderBy('kategori')->get()->groupBy('kategori');
        return view('admin.statistik-penduduk.index', compact('items'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tahun' => 'required|integer',
            'kategori' => 'required|string|max:100',
            'sub_kategori' => 'required|string|max:100',
            'nilai' => 'required|integer',
            'satuan' => 'nullable|string|max:50',
        ]);

        StatistikPenduduk::create($validated);

        return redirect()->route('admin.statistik-penduduk.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, StatistikPenduduk $statistik_penduduk)
    {
        $validated = $request->validate([
            'tahun' => 'required|integer',
            'kategori' => 'required|string|max:100',
            'sub_kategori' => 'required|string|max:100',
            'nilai' => 'required|integer',
            'satuan' => 'nullable|string|max:50',
        ]);

        $statistik_penduduk->update($validated);

        return redirect()->route('admin.statistik-penduduk.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(StatistikPenduduk $statistik_penduduk)
    {
        $statistik_penduduk->delete();
        return redirect()->route('admin.statistik-penduduk.index')->with('success', 'Data berhasil dihapus.');
    }
}