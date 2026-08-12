<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilDesaController extends Controller
{
    // Karena hanya ada 1 baris data, index() langsung arahkan ke form yang sesuai
    public function index()
    {
        $profil = ProfilDesa::first();

        if (!$profil) {
            return redirect()->route('admin.profil-desa.create');
        }

        return redirect()->route('admin.profil-desa.edit', $profil);
    }

    public function create()
    {
        // Kalau ternyata udah ada data, lempar ke edit aja
        if (ProfilDesa::exists()) {
            return redirect()->route('admin.profil-desa.edit', ProfilDesa::first());
        }

        return view('admin.profil-desa.form', ['profil' => new ProfilDesa()]);
    }

    public function store(Request $request)
    {
        $validated = $this->validated($request);

        if ($request->hasFile('foto_cover')) {
            $validated['foto_cover'] = $request->file('foto_cover')->store('profil', 'public');
        }

        ProfilDesa::create($validated);

        return redirect()->route('admin.profil-desa.index')->with('success', 'Profil desa berhasil disimpan.');
    }

    public function edit(ProfilDesa $profil_desa)
    {
        return view('admin.profil-desa.form', ['profil' => $profil_desa]);
    }

    public function update(Request $request, ProfilDesa $profil_desa)
    {
        $validated = $this->validated($request);

        if ($request->hasFile('foto_cover')) {
            if ($profil_desa->foto_cover) {
                Storage::disk('public')->delete($profil_desa->foto_cover);
            }
            $validated['foto_cover'] = $request->file('foto_cover')->store('profil', 'public');
        }

        $profil_desa->update($validated);

        return redirect()->route('admin.profil-desa.index')->with('success', 'Profil desa berhasil diperbarui.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'nama_desa' => 'required|string|max:255',
            'alamat_kantor' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'sejarah' => 'nullable|string',
            'sejarah_singkat' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'visi_misi' => 'nullable|string',
            'kecamatan' => 'nullable|string|max:100',
            'kabupaten' => 'nullable|string|max:100',
            'provinsi' => 'nullable|string|max:100',
            'luas_wilayah_ha' => 'nullable|numeric',
            'ketinggian_min_m' => 'nullable|numeric',
            'ketinggian_max_m' => 'nullable|numeric',
            'curah_hujan' => 'nullable|string|max:100',
            'topografi' => 'nullable|string|max:100',
            'suhu_min' => 'nullable|numeric',
            'suhu_max' => 'nullable|numeric',
            'jarak_kecamatan_km' => 'nullable|numeric',
            'jarak_kabupaten_km' => 'nullable|numeric',
            'jarak_provinsi_km' => 'nullable|numeric',
            'jarak_ibukota_km' => 'nullable|numeric',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'maps_embed_url' => 'nullable|string',
            'kondisi_akses' => 'nullable|string',
            'kondisi_sinyal' => 'nullable|string',
            'foto_cover' => 'nullable|image|max:2048',
        ]);
    }
}