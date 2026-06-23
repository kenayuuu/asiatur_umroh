@extends('admin.layouts.app')

@section('title', 'Detail Business')

@section('content')
    <div class="container-fluid px-3 px-md-4 py-4">
        <div class="page-header d-flex flex-column flex-md-row justify-content-between align-items-start gap-3 mb-4">
            <div>
                <h3>Detail Business</h3>
                <p class="text-muted">{{ $business->judul }}</p>
            </div>
            <a href="{{ route('admin.businesses.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                <i class="bi bi-arrow-left me-2"></i>
                Kembali
            </a>
        </div>

        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card shadow-sm rounded-4 border-0">
                    <img src="{{ $business->image_url }}" class="card-img-top rounded-top-4" alt="{{ $business->judul }}"
                        style="max-height: 420px; object-fit: cover;">
                    <div class="card-body p-4">
                        <h4 class="mb-3">{{ $business->judul }}</h4>
                        <p class="text-muted">{{ $business->deskripsi }}</p>
                        <p><strong>Status:</strong> {{ $business->is_active ? 'Aktif' : 'Tidak Aktif' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow-sm rounded-4 border-0 p-4">
                    <h5 class="mb-3">Aksi</h5>
                    <a href="{{ route('admin.businesses.edit', $business->id) }}" class="btn btn-warning w-100 mb-3">
                        <i class="bi bi-pencil-square me-2"></i>
                        Edit Business
                    </a>
                    <form action="{{ route('admin.businesses.destroy', $business->id) }}" method="POST"
                        onsubmit="return confirm('Hapus business ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="bi bi-trash-fill me-2"></i>
                            Hapus Business
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
