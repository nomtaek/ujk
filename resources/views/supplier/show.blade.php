<!-- resources/views/supplier/show.blade.php -->
@extends('layouts.app')

@section('title', $supplier->nama)

@section('content')
<div class="mb-4">
    <a href="{{ route('supplier.index') }}" class="btn btn-sm btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>

<div class="card" style="max-width: 650px; margin: auto;">
    <div class="card-header py-3" style="background-color: #3e1f00;">
        <h5 class="mb-0 text-white">🚚 Detail Pemasok</h5>
    </div>
    <div class="card-body p-4">
        <table class="table table-borderless">
            <tr>
                <th width="160" style="color: #6f3d1f;">Nama Pemasok</th>
                <td class="fw-semibold">{{ $supplier->nama }}</td>
            </tr>
            <tr>
                <th style="color: #6f3d1f;">Nama Pemilik</th>
                <td>{{ $supplier->nama_pemilik }}</td>
            </tr>
            <tr>
                <th style="color: #6f3d1f;">Email</th>
                <td>
                    <a href="mailto:{{ $supplier->email }}" class="text-decoration-none">
                        {{ $supplier->email }}
                    </a>
                </td>
            </tr>
            <tr>
                <th style="color: #6f3d1f;">Telepon</th>
                <td>
                    <a href="tel:{{ $supplier->telepon }}" class="text-decoration-none">
                        {{ $supplier->telepon }}
                    </a>
                </td>
            </tr>
            <tr>
                <th style="color: #6f3d1f;">Alamat</th>
                <td>{{ $supplier->alamat }}</td>
            </tr>
            <tr>
                <th style="color: #6f3d1f;">Kota</th>
                <td>{{ $supplier->kota }}</td>
            </tr>
            <tr>
                <th style="color: #6f3d1f;">Provinsi</th>
                <td>{{ $supplier->provinsi }}</td>
            </tr>
            <tr>
                <th style="color: #6f3d1f;">Kode Pos</th>
                <td>{{ $supplier->kode_pos ?? '-' }}</td>
            </tr>
            <tr>
                <th style="color: #6f3d1f;">Status</th>
                <td>
                    <span class="badge {{ $supplier->status === 'Aktif' ? 'bg-success' : 'bg-secondary' }}">
                        {{ $supplier->status }}
                    </span>
                </td>
            </tr>
            <tr>
                <th style="color: #6f3d1f;">Catatan</th>
                <td>{{ $supplier->catatan ?? '-' }}</td>
            </tr>
            <tr>
                <th style="color: #6f3d1f;">Ditambahkan</th>
                <td>{{ $supplier->created_at->format('d M Y, H:i') }}</td>
            </tr>
            <tr>
                <th style="color: #6f3d1f;">Diperbarui</th>
                <td>{{ $supplier->updated_at->format('d M Y, H:i') }}</td>
            </tr>
        </table>

        <div class="d-flex gap-2 mt-3">
            <a href="{{ route('supplier.edit', $supplier) }}" class="btn btn-warning">
                <i class="bi bi-pencil me-1"></i> Edit
            </a>
            <form action="{{ route('supplier.destroy', $supplier) }}" method="POST"
                  onsubmit="return confirm('Yakin hapus data ini?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">
                    <i class="bi bi-trash me-1"></i> Hapus
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
