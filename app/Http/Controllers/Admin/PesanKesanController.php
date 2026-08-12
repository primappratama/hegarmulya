<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PesanKesan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PesanKesanController extends Controller
{
    public function index()
    {
        $pesanKesans = PesanKesan::orderBy('urutan')->paginate(10);
        return view('admin.pesan-kesan.index', compact('pesanKesans'));
    }

    public function create()
    {
        return view('admin.pesan-kesan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'nullable|string|max:255',
            'narasi' => 'required|string',
            'nama_penulis' => 'nullable|string|max:255',
            'urutan' => 'nullable|integer',
            'tampilkan' => 'nullable|boolean',
            'foto' => 'nullable|image|max:2048',
        ]);

        $validated['tampilkan'] = $request->has('tampilkan');

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('pesan-kesan', 'public');
        }

        PesanKesan::create($validated);

        return redirect()->route('admin.pesan-kesan.index')->with('success', 'Pesan & kesan berhasil ditambahkan.');
    }

    public function edit(PesanKesan $pesanKesan)
    {
        return view('admin.pesan-kesan.edit', compact('pesanKesan'));
    }

    public function update(Request $request, PesanKesan $pesanKesan)
    {
        $validated = $request->validate([
            'judul' => 'nullable|string|max:255',
            'narasi' => 'required|string',
            'nama_penulis' => 'nullable|string|max:255',
            'urutan' => 'nullable|integer',
            'tampilkan' => 'nullable|boolean',
            'foto' => 'nullable|image|max:2048',
        ]);

        $validated['tampilkan'] = $request->has('tampilkan');

        if ($request->hasFile('foto')) {
            if ($pesanKesan->foto) {
                Storage::disk('public')->delete($pesanKesan->foto);
            }
            $validated['foto'] = $request->file('foto')->store('pesan-kesan', 'public');
        }

        $pesanKesan->update($validated);

        return redirect()->route('admin.pesan-kesan.index')->with('success', 'Pesan & kesan berhasil diperbarui.');
    }

    public function destroy(PesanKesan $pesanKesan)
    {
        if ($pesanKesan->foto) {
            Storage::disk('public')->delete($pesanKesan->foto);
        }
        $pesanKesan->delete();

        return redirect()->route('admin.pesan-kesan.index')->with('success', 'Pesan & kesan berhasil dihapus.');
    }
}