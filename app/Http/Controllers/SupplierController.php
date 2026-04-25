<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::latest()->paginate(10);
        return view('supplier.index', compact('suppliers'));
    }

    public function create()
    {
        return view('supplier.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'         => 'required|string|max:100',
            'nama_pemilik' => 'required|string|max:100',
            'email'        => 'required|email|unique:suppliers,email',
            'telepon'      => 'required|string|max:15',
            'alamat'       => 'required|string',
            'kota'         => 'required|string|max:50',
            'provinsi'     => 'required|string|max:50',
            'kode_pos'     => 'nullable|string|max:10',
            'catatan'      => 'nullable|string',
            'status'       => 'required|in:Aktif,Nonaktif',
        ]);

        Supplier::create($validated);

        return redirect()->route('supplier.index')->with('success', 'Pemasok berhasil ditambahkan!');
    }

    public function show(Supplier $supplier)
    {
        return view('supplier.show', compact('supplier'));
    }

    public function edit(Supplier $supplier)
    {
        return view('supplier.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'nama'         => 'required|string|max:100',
            'nama_pemilik' => 'required|string|max:100',
            'email'        => 'required|email|unique:suppliers,email,' . $supplier->id,
            'telepon'      => 'required|string|max:15',
            'alamat'       => 'required|string',
            'kota'         => 'required|string|max:50',
            'provinsi'     => 'required|string|max:50',
            'kode_pos'     => 'nullable|string|max:10',
            'catatan'      => 'nullable|string',
            'status'       => 'required|in:Aktif,Nonaktif',
        ]);

        $supplier->update($validated);

        return redirect()->route('supplier.index')->with('success', 'Data pemasok berhasil diperbarui!');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()->route('supplier.index')->with('success', 'Data pemasok berhasil dihapus!');
    }
}
