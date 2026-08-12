<?php
 
namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use App\Models\SaranaKesehatan;
use Illuminate\Http\Request;
 
class SaranaKesehatanController extends Controller
{
    public function index()
    {
        $items = SaranaKesehatan::orderBy('jenis')->get();
        return view('admin.sarana-kesehatan.index', compact('items'));
    }
 
    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'tahun' => 'nullable|integer',
        ]);
        SaranaKesehatan::create($validated);
        return redirect()->route('admin.sarana-kesehatan.index')->with('success', 'Data berhasil ditambahkan.');
    }
 
    public function update(Request $request, SaranaKesehatan $sarana_kesehatan)
    {
        $validated = $request->validate([
            'jenis' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'tahun' => 'nullable|integer',
        ]);
        $sarana_kesehatan->update($validated);
        return redirect()->route('admin.sarana-kesehatan.index')->with('success', 'Data berhasil diperbarui.');
    }
 
    public function destroy(SaranaKesehatan $sarana_kesehatan)
    {
        $sarana_kesehatan->delete();
        return redirect()->route('admin.sarana-kesehatan.index')->with('success', 'Data berhasil dihapus.');
    }
}