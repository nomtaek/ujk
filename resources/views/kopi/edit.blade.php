<!-- resources/views/kopi/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Edit Kopi')

@section('content')
<div class="mb-4">
    <a href="{{ route('kopi.index') }}" class="btn btn-sm btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>

<div class="card" style="max-width: 700px; margin: auto;">
    <div class="card-header py-3" style="background-color: #6f3d1f;">
        <h5 class="mb-0 text-white">✏️ Edit Jenis Kopi</h5>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('kopi.update', $kopi) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Nama Kopi <span class="text-danger">*</span></label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                           value="{{ old('nama', $kopi->nama) }}">
                    @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Asal Daerah <span class="text-danger">*</span></label>
                    <input type="text" name="asal_daerah" class="form-control @error('asal_daerah') is-invalid @enderror"
                           value="{{ old('asal_daerah', $kopi->asal_daerah) }}">
                    @error('asal_daerah') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Jenis <span class="text-danger">*</span></label>
                    <select name="jenis" class="form-select @error('jenis') is-invalid @enderror">
                        @foreach(['Arabika','Robusta','Liberika','Excelsa'] as $j)
                            <option value="{{ $j }}" {{ old('jenis', $kopi->jenis) == $j ? 'selected' : '' }}>{{ $j }}</option>
                        @endforeach
                    </select>
                    @error('jenis') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Harga (Rp) <span class="text-danger">*</span></label>
                    <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror"
                           value="{{ old('harga', $kopi->harga) }}" min="0">
                    @error('harga') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Stok (kg) <span class="text-danger">*</span></label>
                    <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror"
                           value="{{ old('stok', $kopi->stok) }}" min="0">
                    @error('stok') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Gambar Baru</label>
                    @if($kopi->gambar)
                        <div class="mb-2">
                            <img src="{{ Storage::url($kopi->gambar) }}" height="70" class="rounded">
                            <small class="text-muted d-block">Gambar saat ini</small>
                        </div>
                    @endif
                    <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror"
                           accept="image/*">
                    @error('gambar') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-12">
                    <label class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror"
                              rows="3">{{ old('deskripsi', $kopi->deskripsi) }}</textarea>
                    @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-coffee">
                    <i class="bi bi-save me-1"></i> Perbarui
                </button>
                <a href="{{ route('kopi.index') }}" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
