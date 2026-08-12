<?php
 
namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use App\Models\PerangkatDesa;
use Illuminate\Http\Request;
 
class PerangkatDesaController extends Controller
{
    public function index()
    {
        $items = PerangkatDesa::orderBy('id')->get();
        return view('admin.perangkat-desa.index', compact('items'));
    }
 
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'nullable|string|max:255',
            'jabatan' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'no_sk' => 'nullable|string|max:255',
            'tanggal_sk' => 'nullable|date',
        ]);
        PerangkatDesa::create($validated);
        return redirect()->route('admin.perangkat-desa.index')->with('success', 'Data berhasil ditambahkan.');
    }
 
    public function update(Request $request, PerangkatDesa $perangkat_desa)
    {
        $validated = $request->validate([
            'nama' => 'nullable|string|max:255',
            'jabatan' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'no_sk' => 'nullable|string|max:255',
            'tanggal_sk' => 'nullable|date',
        ]);
        $perangkat_desa->update($validated);
        return redirect()->route('admin.perangkat-desa.index')->with('success', 'Data berhasil diperbarui.');
    }
 
    public function destroy(PerangkatDesa $perangkat_desa)
    {
        $perangkat_desa->delete();
        return redirect()->route('admin.perangkat-desa.index')->with('success', 'Data berhasil dihapus.');
    }
}