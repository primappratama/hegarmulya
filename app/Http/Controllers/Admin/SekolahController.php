<?php
 
namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use App\Models\Sekolah;
use App\Models\Dusun;
use Illuminate\Http\Request;
 
class SekolahController extends Controller
{
    public function index()
    {
        $items = Sekolah::with('dusun')->orderBy('jenjang')->orderBy('nama_sekolah')->get()->groupBy('jenjang');
        $dusunList = Dusun::orderBy('nama_dusun')->get();
        return view('admin.sekolah.index', compact('items', 'dusunList'));
    }
 
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'jenjang' => 'required|string|max:100',
            'status' => 'required|string|max:50',
            'dusun_id' => 'nullable|exists:dusun,id',
            'jumlah_murid' => 'nullable|integer',
            'jumlah_guru' => 'nullable|integer',
        ]);
        Sekolah::create($validated);
        return redirect()->route('admin.sekolah.index')->with('success', 'Data sekolah berhasil ditambahkan.');
    }
 
    public function update(Request $request, Sekolah $sekolah)
    {
        $validated = $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'jenjang' => 'required|string|max:100',
            'status' => 'required|string|max:50',
            'dusun_id' => 'nullable|exists:dusun,id',
            'jumlah_murid' => 'nullable|integer',
            'jumlah_guru' => 'nullable|integer',
        ]);
        $sekolah->update($validated);
        return redirect()->route('admin.sekolah.index')->with('success', 'Data sekolah berhasil diperbarui.');
    }
 
    public function destroy(Sekolah $sekolah)
    {
        $sekolah->delete();
        return redirect()->route('admin.sekolah.index')->with('success', 'Data sekolah berhasil dihapus.');
    }
}