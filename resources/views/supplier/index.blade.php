<!-- resources/views/supplier/index.blade.php -->
@extends('layouts.app')

@section('title', 'Daftar Pemasok')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-0" style="color: #3e1f00;">🚚 Pemasok Kopi</h4>
        <small class="text-muted">Kelola semua pemasok toko Anda</small>
    </div>
    <a href="{{ route('supplier.create') }}" class="btn btn-coffee">
        <i class="bi bi-plus-circle me-1"></i> Tambah Pemasok
    </a>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead style="background-color: #f5deb3;">
                    <tr>
                        <th class="px-4 py-3">#</th>
                        <th>Nama Pemasok</th>
                        <th>Pemilik</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Kota</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($suppliers as $supplier)
                    <tr>
                        <td class="px-4">{{ $loop->iteration + ($suppliers->currentPage() - 1) * $suppliers->perPage() }}</td>
                        <td class="fw-semibold">{{ $supplier->nama }}</td>
                        <td>{{ $supplier->nama_pemilik }}</td>
                        <td>
                            <a href="mailto:{{ $supplier->email }}" class="text-decoration-none">
                                {{ $supplier->email }}
                            </a>
                        </td>
                        <td>
                            <a href="tel:{{ $supplier->telepon }}" class="text-decoration-none">
                                {{ $supplier->telepon }}
                            </a>
                        </td>
                        <td>{{ $supplier->kota }}</td>
                        <td>
                            <span class="badge {{ $supplier->status === 'Aktif' ? 'bg-success' : 'bg-secondary' }}">
                                {{ $supplier->status }}
                            </span>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('supplier.show', $supplier) }}" class="btn btn-sm btn-outline-secondary me-1">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('supplier.edit', $supplier) }}" class="btn btn-sm btn-outline-warning me-1">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('supplier.destroy', $supplier) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus {{ $supplier->nama }}?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-5 text-muted">
                            <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                            Belum ada data pemasok. Tambahkan sekarang!
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="mt-3">
    {{ $suppliers->links() }}
</div>
@endsection
