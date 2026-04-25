<?php

namespace App\Http\Controllers;

use App\Models\JenisKopi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JenisKopiController extends Controller
{
    public function index()
    {
        $kopis = JenisKopi::latest()->paginate(10);
        return view('kopi.index', compact('kopis'));
    }

    public function create()
    {
        return view('kopi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'        => 'required|string|max:100',
            'asal_daerah' => 'required|string|max:100',
            'jenis'       => 'required|in:Arabika,Robusta,Liberika,Excelsa',
            'deskripsi'   => 'nullable|string',
            'harga'       => 'required|numeric|min:0',
            'stok'        => 'required|integer|min:0',
            'gambar'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('kopi', 'public');
        }

        JenisKopi::create($validated);

        return redirect()->route('kopi.index')->with('success', 'Jenis kopi berhasil ditambahkan!');
    }

    public function show(JenisKopi $kopi)
    {
        return view('kopi.show', compact('kopi'));
    }

    public function edit(JenisKopi $kopi)
    {
        return view('kopi.edit', compact('kopi'));
    }

    public function update(Request $request, JenisKopi $kopi)
    {
        $validated = $request->validate([
            'nama'        => 'required|string|max:100',
            'asal_daerah' => 'required|string|max:100',
            'jenis'       => 'required|in:Arabika,Robusta,Liberika,Excelsa',
            'deskripsi'   => 'nullable|string',
            'harga'       => 'required|numeric|min:0',
            'stok'        => 'required|integer|min:0',
            'gambar'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($kopi->gambar) {
                Storage::disk('public')->delete($kopi->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('kopi', 'public');
        }

        $kopi->update($validated);

        return redirect()->route('kopi.index')->with('success', 'Data kopi berhasil diperbarui!');
    }

    public function destroy(JenisKopi $kopi)
    {
        if ($kopi->gambar) {
            Storage::disk('public')->delete($kopi->gambar);
        }

        $kopi->delete();

        return redirect()->route('kopi.index')->with('success', 'Data kopi berhasil dihapus!');
    }
}
