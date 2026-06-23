@extends('admin.layouts.app')

@section('title', 'Edit Business')

@section('content')
    <div class="container-fluid px-3 px-md-4 py-4">

        <div
            class="page-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
            <div>
                <h3>Edit Business</h3>
                <p>Perbarui data business agar tampil dengan benar di halaman bisnis.</p>
            </div>

            <a href="{{ route('admin.businesses.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                <i class="bi bi-arrow-left me-2"></i>
                Kembali
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger rounded-4 border-0 shadow-sm mb-4">
                <div class="fw-semibold mb-2">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    Terjadi Kesalahan
                </div>
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="card-header border-0 py-4" style="background: linear-gradient(135deg, #FF645A, #C60C00);">
                <h5 class="text-white mb-0 fw-bold">
                    <i class="bi bi-box-seam me-2"></i>
                    Form Edit Business
                </h5>
            </div>
            <div class="card-body p-4 p-md-5">
                <form action="{{ route('admin.businesses.update', $business->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row g-4">
                        <div class="col-12">
                            <label class="form-label fw-semibold">Judul Business</label>
                            <input type="text" name="judul" value="{{ old('judul', $business->judul) }}"
                                class="form-control form-control-lg rounded-3" placeholder="Masukkan judul business"
                                required>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Deskripsi</label>
                            <textarea name="deskripsi" rows="5" class="form-control rounded-3" placeholder="Masukkan deskripsi business">{{ old('deskripsi', $business->deskripsi) }}</textarea>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label fw-semibold">Gambar</label>
                            <input type="file" name="image" class="form-control form-control-lg rounded-3"
                                accept="image/*">
                            <small class="text-muted">Format: JPG, PNG, JPEG</small>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label fw-semibold">Status</label>
                            <select name="is_active" class="form-select form-select-lg rounded-3">
                                <option value="1" {{ old('is_active', $business->is_active) ? 'selected' : '' }}>Aktif
                                </option>
                                <option value="0" {{ !old('is_active', $business->is_active) ? 'selected' : '' }}>Tidak
                                    Aktif</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <div class="border rounded-4 p-3 text-center bg-light">
                                <img src="{{ $business->image_url }}" alt="Preview" class="img-fluid rounded-4 shadow-sm"
                                    style="max-height: 250px; object-fit: cover;">
                            </div>
                        </div>
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-lg text-white px-5 rounded-pill shadow"
                                style="background: linear-gradient(135deg, #FF645A, #C60C00);">
                                <i class="bi bi-save2 me-2"></i>
                                Update Business
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
