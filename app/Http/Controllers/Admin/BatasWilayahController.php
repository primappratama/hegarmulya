<?php
 
namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use App\Models\BatasWilayah;
use Illuminate\Http\Request;
 
class BatasWilayahController extends Controller
{
    public function index()
    {
        $items = BatasWilayah::orderByRaw("FIELD(arah, 'utara','timur','selatan','barat')")->get();
        return view('admin.batas-wilayah.index', compact('items'));
    }
 
    public function store(Request $request)
    {
        $validated = $request->validate([
            'arah' => 'required|string|max:50',
            'keterangan' => 'nullable|string',
        ]);
        BatasWilayah::create($validated);
        return redirect()->route('admin.batas-wilayah.index')->with('success', 'Data berhasil ditambahkan.');
    }
 
    public function update(Request $request, BatasWilayah $batas_wilayah)
    {
        $validated = $request->validate([
            'arah' => 'required|string|max:50',
            'keterangan' => 'nullable|string',
        ]);
        $batas_wilayah->update($validated);
        return redirect()->route('admin.batas-wilayah.index')->with('success', 'Data berhasil diperbarui.');
    }
 
    public function destroy(BatasWilayah $batas_wilayah)
    {
        $batas_wilayah->delete();
        return redirect()->route('admin.batas-wilayah.index')->with('success', 'Data berhasil dihapus.');
    }
}