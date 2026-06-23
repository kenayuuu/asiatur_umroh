@extends('admin.layouts.app')

@section('title', 'Tambah Business')

@section('content')
    <div class="container-fluid px-3 px-md-4 py-4">

        <div
            class="page-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
            <div>
                <h3>Tambah Business</h3>
                <p>Tambahkan business baru dengan tampilan seragam seperti paket admin.</p>
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
                    Form Tambah Business
                </h5>
            </div>
            <div class="card-body p-4 p-md-5">
                <form action="{{ route('admin.businesses.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-4">
                        <div class="col-12">
                            <label class="form-label fw-semibold">Judul Business</label>
                            <input type="text" name="judul" value="{{ old('judul') }}"
                                class="form-control form-control-lg rounded-3" placeholder="Masukkan judul business"
                                required>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Deskripsi</label>
                            <textarea name="deskripsi" rows="5" class="form-control rounded-3" placeholder="Masukkan deskripsi business">{{ old('deskripsi') }}</textarea>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label fw-semibold">Upload Gambar</label>
                            <input type="file" name="image" class="form-control form-control-lg rounded-3"
                                accept="image/*">
                            <small class="text-muted">Format: JPG, PNG, JPEG</small>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label fw-semibold">Status</label>
                            <select name="is_active" class="form-select form-select-lg rounded-3">
                                <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-lg text-white px-5 rounded-pill shadow"
                                style="background: linear-gradient(135deg, #FF645A, #C60C00);">
                                <i class="bi bi-save2 me-2"></i>
                                Simpan Business
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
