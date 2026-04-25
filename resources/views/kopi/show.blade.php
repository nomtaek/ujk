<!-- resources/views/kopi/show.blade.php -->
@extends('layouts.app')

@section('title', $kopi->nama)

@section('content')
<div class="mb-4">
    <a href="{{ route('kopi.index') }}" class="btn btn-sm btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>

<div class="card" style="max-width: 650px; margin: auto;">
    <div class="card-header py-3" style="background-color: #3e1f00;">
        <h5 class="mb-0 text-white">☕ Detail Kopi</h5>
    </div>
    <div class="card-body p-4">
        @if($kopi->gambar)
            <img src="{{ Storage::url($kopi->gambar) }}" class="img-fluid rounded mb-4 w-100"
                 style="max-height: 280px; object-fit: cover;">
        @endif

        <table class="table table-borderless">
            <tr>
                <th width="160" style="color: #6f3d1f;">Nama</th>
                <td>{{ $kopi->nama }}</td>
            </tr>
            <tr>
                <th style="color: #6f3d1f;">Jenis</th>
                <td><span class="badge" style="background-color: #6f3d1f;">{{ $kopi->jenis }}</span></td>
            </tr>
            <tr>
                <th style="color: #6f3d1f;">Asal Daerah</th>
                <td>{{ $kopi->asal_daerah }}</td>
            </tr>
            <tr>
                <th style="color: #6f3d1f;">Harga</th>
                <td class="fw-bold">Rp {{ number_format($kopi->harga, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th style="color: #6f3d1f;">Stok</th>
                <td>
                    <span class="badge {{ $kopi->stok > 0 ? 'bg-success' : 'bg-danger' }}">
                        {{ $kopi->stok }} kg
                    </span>
                </td>
            </tr>
            <tr>
                <th style="color: #6f3d1f;">Deskripsi</th>
                <td>{{ $kopi->deskripsi ?? '-' }}</td>
            </tr>
            <tr>
                <th style="color: #6f3d1f;">Ditambahkan</th>
                <td>{{ $kopi->created_at->format('d M Y, H:i') }}</td>
            </tr>
        </table>

        <div class="d-flex gap-2 mt-3">
            <a href="{{ route('kopi.edit', $kopi) }}" class="btn btn-warning">
                <i class="bi bi-pencil me-1"></i> Edit
            </a>
            <form action="{{ route('kopi.destroy', $kopi) }}" method="POST"
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
