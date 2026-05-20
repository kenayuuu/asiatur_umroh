@extends('admin.layouts.app')

@section('title', 'Tambah Business')

@section('content')
    <div class="container-fluid px-3 px-md-4 py-4">

        <!-- Header -->
        <div class="page-header d-flex flex-column flex-md-row justify-content-between align-items-start gap-3">
            <div>
                <h3>Tambah Business</h3>
                <p class="text-muted">
                    Tambahkan data business baru untuk ASIATUR.
                </p>
            </div>

            <a href="{{ route('admin.business.index') }}" class="btn btn-outline-secondary">
                Kembali ke daftar
            </a>
        </div>

        <!-- Error -->
        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <div class="card shadow-sm mt-3 border-0 rounded-4">
            <div class="card-body p-4">

                <form action="{{ route('admin.business.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="row g-4">

                        <!-- Judul -->
                        <div class="col-12">
                            <label class="form-label fw-semibold">
                                Judul Business
                            </label>

                            <input type="text" name="judul" value="{{ old('judul') }}" class="form-control"
                                placeholder="Masukkan judul business" required>
                        </div>

                        <!-- Deskripsi -->
                        <div class="col-12">
                            <label class="form-label fw-semibold">
                                Deskripsi
                            </label>

                            <textarea name="deskripsi" rows="5" class="form-control" placeholder="Masukkan deskripsi business">{{ old('deskripsi') }}</textarea>
                        </div>

                        <!-- Upload Image -->
                        <div class="col-12 col-md-6">
                            <label class="form-label fw-semibold">
                                Gambar
                            </label>

                            <input type="file" name="image" class="form-control" accept="image/*">

                            <small class="text-muted">
                                Format: JPG, PNG, JPEG
                            </small>
                        </div>

                        <!-- Status -->
                        <div class="col-12 col-md-6">
                            <label class="form-label fw-semibold">
                                Status
                            </label>

                            <select name="is_active" class="form-select">

                                <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>
                                    Aktif
                                </option>

                                <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>
                                    Tidak Aktif
                                </option>

                            </select>
                        </div>

                        <!-- Button -->
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-primary px-4">

                                <i class="bi bi-save me-1"></i>
                                Simpan Business
                            </button>
                        </div>

                    </div>

                </form>

            </div>
        </div>

    </div>
@endsection
