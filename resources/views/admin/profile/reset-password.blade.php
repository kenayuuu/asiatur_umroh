@extends('admin.layouts.app')

@section('title', 'Reset Password')

@section('content')
    <div class="container-fluid px-3 px-md-4 py-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 mb-4">
            <div>
                <h3 class="fw-bold mb-1">Reset Password</h3>
                <p class="text-muted mb-0">Perbarui kata sandi Anda minimal 8 karakter.</p>
            </div>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary rounded-pill px-4">
                <i class="bi bi-arrow-left me-2"></i>
                Kembali
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger rounded-4 border-0 shadow-sm">
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
                    <i class="bi bi-lock-fill me-2"></i>
                    Reset Password
                </h5>
            </div>
            <div class="card-body p-4 p-md-5">
                <form action="{{ route('admin.profile.password.update') }}" method="POST">
                    @csrf
                    <div class="row g-4">
                        <div class="col-12 col-md-6">
                            <label class="form-label fw-semibold">Password Baru</label>
                            <input type="password" name="password" class="form-control form-control-lg rounded-3" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label fw-semibold">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation"
                                class="form-control form-control-lg rounded-3" required>
                        </div>
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-lg text-white px-5 rounded-pill shadow"
                                style="background: linear-gradient(135deg, #FF645A, #C60C00);">
                                <i class="bi bi-save2 me-2"></i>
                                Simpan Password
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
