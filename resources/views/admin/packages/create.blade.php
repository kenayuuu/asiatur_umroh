@extends('admin.layouts.app')

@section('title', 'Tambah Paket Kegiatan')

@section('content')
    <div class="container-fluid px-3 px-md-4 py-4">

        {{-- Header --}}
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">

            <div>
                <h3 class="fw-bold mb-1">Tambah Paket Kegiatan</h3>
                <p class="text-muted mb-0">
                    Tambahkan paket wisata, umroh, atau haji baru.
                </p>
            </div>

            <a href="{{ route('admin.packages.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
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

            {{-- Header --}}
            <div class="card-header border-0 py-4" style="background: linear-gradient(135deg, #FF645A, #C60C00);">

                <h5 class="text-white mb-0 fw-bold">
                    <i class="bi bi-box-seam me-2"></i>
                    Form Tambah Paket
                </h5>
            </div>

            {{-- Body --}}
            <div class="card-body p-4 p-md-5">

                <form action="{{ route('admin.packages.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="row g-4">

                        {{-- Nama Paket --}}
                        <div class="col-12 col-md-6">
                            <label class="form-label fw-semibold">
                                Nama Paket
                            </label>

                            <input type="text" name="nama_paket" value="{{ old('nama_paket') }}"
                                class="form-control form-control-lg rounded-3" placeholder="Masukkan nama paket" required>
                        </div>

                        {{-- Kategori --}}
                        <div class="col-12 col-md-6">
                            <label class="form-label fw-semibold">
                                Kategori
                            </label>

                            <select name="kategori" class="form-select form-select-lg rounded-3" required>

                                <option value="">Pilih Kategori</option>

                                <option value="wisata" {{ old('kategori') === 'wisata' ? 'selected' : '' }}>
                                    Wisata
                                </option>

                                <option value="umroh" {{ old('kategori') === 'umroh' ? 'selected' : '' }}>
                                    Umroh
                                </option>

                                <option value="haji" {{ old('kategori') === 'haji' ? 'selected' : '' }}>
                                    Haji
                                </option>

                            </select>
                        </div>

                        {{-- Destinasi --}}
                        <div class="col-12 col-md-6">
                            <label class="form-label fw-semibold">
                                Destinasi
                            </label>

                            <input type="text" name="destinasi" value="{{ old('destinasi') }}"
                                class="form-control form-control-lg rounded-3" placeholder="Contoh: Bali, Mekkah" required>
                        </div>

                        {{-- Tanggal --}}
                        <div class="col-12 col-md-6">
                            <label class="form-label fw-semibold">
                                Tanggal Berlangsung
                            </label>

                            <input type="date" name="tanggal_berlangsung" value="{{ old('tanggal_berlangsung') }}"
                                class="form-control form-control-lg rounded-3">
                        </div>

                        {{-- Harga --}}
                        <div class="col-12 col-md-6">
                            <label class="form-label fw-semibold">
                                Harga
                            </label>

                            <input type="number" name="harga" value="{{ old('harga', 0) }}"
                                class="form-control form-control-lg rounded-3" min="0" required>
                        </div>

                        {{-- Deposit --}}
                        <div class="col-12 col-md-6">
                            <label class="form-label fw-semibold">
                                Deposit
                            </label>

                            <input type="number" name="deposit" value="{{ old('deposit') }}"
                                class="form-control form-control-lg rounded-3" min="0">
                        </div>

                        {{-- Durasi --}}
                        <div class="col-12 col-md-6">
                            <label class="form-label fw-semibold">
                                Durasi
                            </label>

                            <input type="text" name="durasi" value="{{ old('durasi') }}"
                                class="form-control form-control-lg rounded-3" placeholder="Contoh: 7 Hari 6 Malam">
                        </div>

                        {{-- Upload Gambar --}}
                        <div class="col-12 col-md-6">
                            <label class="form-label fw-semibold">
                                Upload Gambar
                            </label>

                            <input type="file" name="image" class="form-control form-control-lg rounded-3"
                                accept="image/*">

                            <small class="text-muted">
                                Format: JPG, PNG, JPEG
                            </small>
                        </div>

                        {{-- Preview --}}
                        <div class="col-12">
                            <div class="border rounded-4 p-3 text-center bg-light">

                                <img id="preview-image" src="{{ asset('images/default.jpg') }}" alt="Preview"
                                    class="img-fluid rounded-4 shadow-sm" style="max-height: 250px; object-fit: cover;">

                            </div>
                        </div>

                        {{-- Deskripsi --}}
                        <div class="col-12">
                            <label class="form-label fw-semibold">
                                Deskripsi Paket
                            </label>

                            <textarea name="deskripsi" rows="5" class="form-control rounded-3" placeholder="Masukkan deskripsi paket">{{ old('deskripsi') }}</textarea>
                        </div>

                        {{-- Rundown --}}
                        <div class="col-12">
                            <label class="form-label fw-semibold">
                                Rundown
                            </label>

                            <textarea name="rundown" rows="5" class="form-control rounded-3" placeholder="Masukkan rundown perjalanan">{{ old('rundown') }}</textarea>
                        </div>

                        {{-- Status --}}
                        <div class="col-12">
                            <div class="form-check form-switch">

                                <input class="form-check-input" type="checkbox" role="switch" name="is_active"
                                    id="is_active" {{ old('is_active') ? 'checked' : '' }}>

                                <label class="form-check-label fw-semibold" for="is_active">
                                    Aktifkan Paket
                                </label>

                            </div>
                        </div>

                        {{-- Button --}}
                        <div class="col-12 text-end">

                            <button type="submit" class="btn btn-lg text-white px-5 rounded-pill shadow"
                                style="background: linear-gradient(135deg, #FF645A, #C60C00);">

                                <i class="bi bi-save2 me-2"></i>
                                Simpan Paket

                            </button>

                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>

    {{-- Preview Image --}}
    <script>
        document.querySelector('input[name="image"]').addEventListener('change', function(e) {

            const preview = document.getElementById('preview-image');

            const file = e.target.files[0];

            if (file) {

                preview.src = URL.createObjectURL(file);
            }
        });
    </script>
@endsection
