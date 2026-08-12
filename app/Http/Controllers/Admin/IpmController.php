<?php
 
namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use App\Models\Ipm;
use Illuminate\Http\Request;
 
class IpmController extends Controller
{
    public function index()
    {
        $ipm = Ipm::latest('tahun')->first();
        if (!$ipm) {
            return redirect()->route('admin.ipm.create');
        }
        return redirect()->route('admin.ipm.edit', $ipm);
    }
 
    public function create()
    {
        return view('admin.ipm.form', ['ipm' => new Ipm()]);
    }
 
    public function store(Request $request)
    {
        $validated = $this->validated($request);
        Ipm::create($validated);
        return redirect()->route('admin.ipm.index')->with('success', 'Data IPM berhasil disimpan.');
    }
 
    public function edit(Ipm $ipm)
    {
        return view('admin.ipm.form', compact('ipm'));
    }
 
    public function update(Request $request, Ipm $ipm)
    {
        $validated = $this->validated($request);
        $ipm->update($validated);
        return redirect()->route('admin.ipm.index')->with('success', 'Data IPM berhasil diperbarui.');
    }
 
    private function validated(Request $request): array
    {
        return $request->validate([
            'tahun' => 'required|integer',
            'indeks_pendidikan' => 'nullable|numeric',
            'indeks_kesehatan' => 'nullable|numeric',
            'indeks_daya_beli' => 'nullable|numeric',
            'realisasi_ipm' => 'nullable|numeric',
            'target_ipm_kecamatan' => 'nullable|numeric',
            'target_ipm_kabupaten' => 'nullable|numeric',
        ]);
    }
}