<!-- resources/views/supplier/create.blade.php -->
@extends('layouts.app')

@section('title', 'Tambah Pemasok')

@section('content')
<div class="mb-4">
    <a href="{{ route('supplier.index') }}" class="btn btn-sm btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>

<div class="card" style="max-width: 700px; margin: auto;">
    <div class="card-header py-3" style="background-color: #3e1f00;">
        <h5 class="mb-0 text-white">🚚 Tambah Pemasok Kopi</h5>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('supplier.store') }}" method="POST">
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Nama Pemasok <span class="text-danger">*</span></label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                           value="{{ old('nama') }}" placeholder="cth. PT Kopi Nusantara">
                    @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Nama Pemilik <span class="text-danger">*</span></label>
                    <input type="text" name="nama_pemilik" class="form-control @error('nama_pemilik') is-invalid @enderror"
                           value="{{ old('nama_pemilik') }}" placeholder="cth. Budi Santoso">
                    @error('nama_pemilik') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}" placeholder="cth. info@kopinusantara.com">
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Telepon <span class="text-danger">*</span></label>
                    <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror"
                           value="{{ old('telepon') }}" placeholder="cth. 081234567890">
                    @error('telepon') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-12">
                    <label class="form-label fw-semibold">Alamat <span class="text-danger">*</span></label>
                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror"
                              rows="2" placeholder="Jalan, No. Rumah, RT/RW">{{ old('alamat') }}</textarea>
                    @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Kota <span class="text-danger">*</span></label>
                    <input type="text" name="kota" class="form-control @error('kota') is-invalid @enderror"
                           value="{{ old('kota') }}" placeholder="cth. Jakarta">
                    @error('kota') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Provinsi <span class="text-danger">*</span></label>
                    <input type="text" name="provinsi" class="form-control @error('provinsi') is-invalid @enderror"
                           value="{{ old('provinsi') }}" placeholder="cth. DKI Jakarta">
                    @error('provinsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Kode Pos</label>
                    <input type="text" name="kode_pos" class="form-control @error('kode_pos') is-invalid @enderror"
                           value="{{ old('kode_pos') }}" placeholder="cth. 12345">
                    @error('kode_pos') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-select @error('status') is-invalid @enderror">
                        <option value="">-- Pilih Status --</option>
                        <option value="Aktif" {{ old('status') === 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Nonaktif" {{ old('status') === 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                    @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-12">
                    <label class="form-label fw-semibold">Catatan</label>
                    <textarea name="catatan" class="form-control @error('catatan') is-invalid @enderror"
                              rows="3" placeholder="Catatan tambahan tentang pemasok...">{{ old('catatan') }}</textarea>
                    @error('catatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-coffee">
                    <i class="bi bi-save me-1"></i> Simpan
                </button>
                <a href="{{ route('supplier.index') }}" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
