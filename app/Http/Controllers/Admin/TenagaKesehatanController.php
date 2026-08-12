<?php
 
namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use App\Models\TenagaKesehatan;
use Illuminate\Http\Request;
 
class TenagaKesehatanController extends Controller
{
    public function index()
    {
        $items = TenagaKesehatan::orderBy('jenis_tenaga')->get();
        return view('admin.tenaga-kesehatan.index', compact('items'));
    }
 
    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis_tenaga' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'tahun' => 'required|integer',
        ]);
        TenagaKesehatan::create($validated);
        return redirect()->route('admin.tenaga-kesehatan.index')->with('success', 'Data berhasil ditambahkan.');
    }
 
    public function update(Request $request, TenagaKesehatan $tenaga_kesehatan)
    {
        $validated = $request->validate([
            'jenis_tenaga' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'tahun' => 'required|integer',
        ]);
        $tenaga_kesehatan->update($validated);
        return redirect()->route('admin.tenaga-kesehatan.index')->with('success', 'Data berhasil diperbarui.');
    }
 
    public function destroy(TenagaKesehatan $tenaga_kesehatan)
    {
        $tenaga_kesehatan->delete();
        return redirect()->route('admin.tenaga-kesehatan.index')->with('success', 'Data berhasil dihapus.');
    }
}