@extends('admin.layouts.app')

@section('title', 'Edit User')

@section('content')
    <div class="container-fluid px-3 px-md-4 py-4">

        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
            <div>
                <h3>Edit User</h3>
                <p class="text-muted">Perbarui data user dan role sesuai kebutuhan.</p>
            </div>
            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
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
                    <i class="bi bi-person-badge-fill me-2"></i>
                    Form Edit User
                </h5>
            </div>
            <div class="card-body p-4 p-md-5">
                <form action="{{ route('admin.users.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row g-4">
                        <div class="col-12 col-md-6">
                            <label class="form-label fw-semibold">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                class="form-control form-control-lg rounded-3" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                class="form-control form-control-lg rounded-3" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label fw-semibold">No Telepon</label>
                            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                                class="form-control form-control-lg rounded-3">
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label fw-semibold">Role</label>
                            <select name="role" class="form-select form-select-lg rounded-3" required>
                                <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin
                                </option>
                                <option value="user" {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>User
                                </option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label fw-semibold">Password Baru</label>
                            <input type="password" name="password" class="form-control form-control-lg rounded-3"
                                placeholder="Kosongkan jika tidak diubah">
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label fw-semibold">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation"
                                class="form-control form-control-lg rounded-3" placeholder="Kosongkan jika tidak diubah">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Alamat</label>
                            <textarea name="address" rows="4" class="form-control rounded-3">{{ old('address', $user->address) }}</textarea>
                        </div>
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-lg text-white px-5 rounded-pill shadow"
                                style="background: linear-gradient(135deg, #FF645A, #C60C00);">
                                <i class="bi bi-check-circle-fill me-2"></i>
                                Perbarui User
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
