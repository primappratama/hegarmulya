<?php
 
namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use App\Models\LembagaKemasyarakatan;
use Illuminate\Http\Request;
 
class LembagaKemasyarakatanController extends Controller
{
    public function index()
    {
        $items = LembagaKemasyarakatan::orderBy('nama_lembaga')->get();
        return view('admin.lembaga-kemasyarakatan.index', compact('items'));
    }
 
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lembaga' => 'required|string|max:255',
            'jumlah_pengurus' => 'required|integer',
            'tahun' => 'nullable|integer',
        ]);
        LembagaKemasyarakatan::create($validated);
        return redirect()->route('admin.lembaga-kemasyarakatan.index')->with('success', 'Data berhasil ditambahkan.');
    }
 
    public function update(Request $request, LembagaKemasyarakatan $lembaga_kemasyarakatan)
    {
        $validated = $request->validate([
            'nama_lembaga' => 'required|string|max:255',
            'jumlah_pengurus' => 'required|integer',
            'tahun' => 'nullable|integer',
        ]);
        $lembaga_kemasyarakatan->update($validated);
        return redirect()->route('admin.lembaga-kemasyarakatan.index')->with('success', 'Data berhasil diperbarui.');
    }
 
    public function destroy(LembagaKemasyarakatan $lembaga_kemasyarakatan)
    {
        $lembaga_kemasyarakatan->delete();
        return redirect()->route('admin.lembaga-kemasyarakatan.index')->with('success', 'Data berhasil dihapus.');
    }
}