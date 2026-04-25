<!-- resources/views/kopi/index.blade.php -->
@extends('layouts.app')

@section('title', 'Daftar Jenis Kopi')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-0" style="color: #3e1f00;">☕ Jenis Kopi</h4>
        <small class="text-muted">Kelola semua jenis kopi toko Anda</small>
    </div>
    <a href="{{ route('kopi.create') }}" class="btn btn-coffee">
        <i class="bi bi-plus-circle me-1"></i> Tambah Kopi
    </a>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead style="background-color: #f5deb3;">
                    <tr>
                        <th class="px-4 py-3">#</th>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Asal Daerah</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kopis as $kopi)
                    <tr>
                        <td class="px-4">{{ $loop->iteration + ($kopis->currentPage() - 1) * $kopis->perPage() }}</td>
                        <td>
                            @if($kopi->gambar)
                                <img src="{{ Storage::url($kopi->gambar) }}" width="50" height="50"
                                     class="rounded" style="object-fit: cover;">
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                        <td class="fw-semibold">{{ $kopi->nama }}</td>
                        <td>
                            <span class="badge"
                                  style="background-color:
                                    {{ $kopi->jenis === 'Arabika' ? '#6f3d1f' :
                                      ($kopi->jenis === 'Robusta' ? '#3e1f00' :
                                      ($kopi->jenis === 'Liberika' ? '#c8702a' : '#a0522d')) }}">
                                {{ $kopi->jenis }}
                            </span>
                        </td>
                        <td>{{ $kopi->asal_daerah }}</td>
                        <td>Rp {{ number_format($kopi->harga, 0, ',', '.') }}</td>
                        <td>
                            <span class="badge {{ $kopi->stok > 0 ? 'bg-success' : 'bg-danger' }}">
                                {{ $kopi->stok }} kg
                            </span>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('kopi.show', $kopi) }}" class="btn btn-sm btn-outline-secondary me-1">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('kopi.edit', $kopi) }}" class="btn btn-sm btn-outline-warning me-1">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('kopi.destroy', $kopi) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus {{ $kopi->nama }}?')">
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
                            <i class="bi bi-cup-hot fs-1 d-block mb-2"></i>
                            Belum ada data kopi. Tambahkan sekarang!
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="mt-3">
    {{ $kopis->links() }}
</div>
@endsection
