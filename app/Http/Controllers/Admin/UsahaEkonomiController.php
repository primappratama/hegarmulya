<?php
 
namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use App\Models\UsahaEkonomi;
use Illuminate\Http\Request;
 
class UsahaEkonomiController extends Controller
{
    public function index()
    {
        $items = UsahaEkonomi::orderBy('jenis_usaha')->orderBy('sub_jenis')->get()->groupBy('jenis_usaha');
        return view('admin.usaha-ekonomi.index', compact('items'));
    }
 
    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis_usaha' => 'required|string|max:255',
            'sub_jenis' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'tahun' => 'nullable|integer',
        ]);
        UsahaEkonomi::create($validated);
        return redirect()->route('admin.usaha-ekonomi.index')->with('success', 'Data berhasil ditambahkan.');
    }
 
    public function update(Request $request, UsahaEkonomi $usaha_ekonomi)
    {
        $validated = $request->validate([
            'jenis_usaha' => 'required|string|max:255',
            'sub_jenis' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'tahun' => 'nullable|integer',
        ]);
        $usaha_ekonomi->update($validated);
        return redirect()->route('admin.usaha-ekonomi.index')->with('success', 'Data berhasil diperbarui.');
    }
 
    public function destroy(UsahaEkonomi $usaha_ekonomi)
    {
        $usaha_ekonomi->delete();
        return redirect()->route('admin.usaha-ekonomi.index')->with('success', 'Data berhasil dihapus.');
    }
}