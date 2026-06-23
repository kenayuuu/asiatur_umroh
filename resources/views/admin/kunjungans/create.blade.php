@extends('admin.layouts.app')

@section('title', 'Tambah Kunjungan')

@section('content')

    <div class="container-fluid px-3 px-md-4 py-4">

        {{-- Header --}}
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">

            <div>
                <h3 class="fw-bold mb-1">Tambah Kunjungan</h3>
                <p class="text-muted mb-0">
                    Tambahkan data kunjungan promosi atau relasi baru.
                </p>
            </div>

            <a href="{{ route('admin.kunjungans.index') }}" class="btn btn-outline-secondary rounded-pill px-4">

                <i class="bi bi-arrow-left me-2"></i>
                Kembali

            </a>

        </div>

        {{-- Error --}}
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

        {{-- Card --}}
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

            {{-- Header Card --}}
            <div class="card-header border-0 py-4" style="background: linear-gradient(135deg, #FF645A, #C60C00);">

                <h5 class="text-white mb-0 fw-bold">
                    <i class="bi bi-geo-alt-fill me-2"></i>
                    Form Tambah Kunjungan
                </h5>

            </div>

            {{-- Body --}}
            <div class="card-body p-4 p-md-5">

                <form action="{{ route('admin.kunjungans.store') }}" method="POST">

                    @csrf

                    <div class="row g-4">

                        {{-- Tempat --}}
                        <div class="col-12 col-md-6">

                            <label class="form-label fw-semibold">
                                Nama Tempat
                            </label>

                            <input type="text" name="tempat" value="{{ old('tempat') }}"
                                class="form-control form-control-lg rounded-3" required>

                        </div>

                        {{-- Pimpinan --}}
                        <div class="col-12 col-md-6">

                            <label class="form-label fw-semibold">
                                Nama Pimpinan
                            </label>

                            <input type="text" name="pimpinan" value="{{ old('pimpinan') }}"
                                class="form-control form-control-lg rounded-3" required>

                        </div>

                        {{-- No HP --}}
                        <div class="col-12 col-md-6">

                            <label class="form-label fw-semibold">
                                Nomor HP
                            </label>

                            <input type="text" name="no_hp" value="{{ old('no_hp') }}"
                                class="form-control form-control-lg rounded-3" required>

                        </div>

                        {{-- Tanggal --}}
                        <div class="col-12 col-md-6">

                            <label class="form-label fw-semibold">
                                Tanggal Kunjungan
                            </label>

                            <input type="date" name="tanggal" value="{{ old('tanggal') }}"
                                class="form-control form-control-lg rounded-3" required>

                        </div>

                        {{-- Keterangan --}}
                        <div class="col-12">

                            <label class="form-label fw-semibold">
                                Keterangan
                            </label>

                            <textarea name="keterangan" rows="5" class="form-control rounded-3">{{ old('keterangan') }}</textarea>

                        </div>

                        {{-- Tombol --}}
                        <div class="col-12 text-end">

                            <button type="submit" class="btn btn-lg text-white px-5 rounded-pill shadow"
                                style="background: linear-gradient(135deg, #FF645A, #C60C00);">

                                <i class="bi bi-save2 me-2"></i>
                                Simpan Kunjungan

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

@endsection
