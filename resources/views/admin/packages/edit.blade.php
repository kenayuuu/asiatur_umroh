@extends('admin.layouts.app')

@section('title', 'Edit Paket Kegiatan')

@push('styles')
    <style>
        body {
            background: #f5f7fb;
        }

        .page-header {
            background: linear-gradient(135deg, #ff645a, #c60c00);
            border-radius: 1.8rem;
            padding: 2rem;
            color: white;
            box-shadow: 0 12px 28px rgba(198, 12, 0, .18);
        }

        .page-header h3 {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: .4rem;
        }

        .page-header p {
            margin: 0;
            color: rgba(255, 255, 255, .85);
        }

        .btn-back {
            background: rgba(255, 255, 255, .15);
            border: 1px solid rgba(255, 255, 255, .25);
            color: white;
            border-radius: 1rem;
            padding: .85rem 1.3rem;
            font-weight: 600;
            backdrop-filter: blur(10px);
            transition: .3s ease;
        }

        .btn-back:hover {
            background: white;
            color: #c60c00;
            transform: translateY(-2px);
        }

        .edit-card {
            background: white;
            border: none;
            border-radius: 1.8rem;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .06);
        }

        .card-header-custom {
            background: linear-gradient(to right, #fff5f5, #ffffff);
            padding: 1.5rem 2rem;
            border-bottom: 1px solid #f1f1f1;
        }

        .card-header-custom h5 {
            margin: 0;
            font-weight: 800;
            color: #111827;
        }

        .card-header-custom p {
            margin: .25rem 0 0;
            color: #6b7280;
            font-size: .95rem;
        }

        .card-body-custom {
            padding: 2rem;
        }

        .form-label {
            font-weight: 700;
            color: #374151;
            margin-bottom: .65rem;
        }

        .form-control,
        .form-select {
            border-radius: 1rem;
            border: 1px solid #e5e7eb;
            padding: .9rem 1rem;
            transition: .3s ease;
            box-shadow: none !important;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #ff645a;
            box-shadow: 0 0 0 4px rgba(255, 100, 90, .12) !important;
        }

        textarea.form-control {
            min-height: 140px;
            resize: none;
        }

        .image-preview {
            width: 100%;
            max-height: 250px;
            object-fit: cover;
            border-radius: 1.2rem;
            border: 1px solid #eee;
            margin-top: 1rem;
        }

        .form-check-input {
            width: 1.2rem;
            height: 1.2rem;
            cursor: pointer;
        }

        .form-check-input:checked {
            background-color: #c60c00;
            border-color: #c60c00;
        }

        .form-check-label {
            margin-left: .4rem;
            font-weight: 600;
            color: #374151;
            cursor: pointer;
        }

        .btn-update-package {
            background: linear-gradient(135deg, #ff645a, #c60c00);
            border: none;
            color: white;
            padding: .95rem 1.8rem;
            border-radius: 1rem;
            font-weight: 700;
            transition: .3s ease;
            box-shadow: 0 10px 20px rgba(198, 12, 0, .22);
        }

        .btn-update-package:hover {
            background: linear-gradient(135deg, #ff7b73, #a80000);
            transform: translateY(-2px);
            color: white;
            box-shadow: 0 14px 24px rgba(198, 12, 0, .32);
        }

        .alert-danger {
            border-radius: 1rem;
            border: none;
            box-shadow: 0 5px 18px rgba(220, 38, 38, .08);
        }

        .section-title {
            font-size: 1.05rem;
            font-weight: 800;
            color: #111827;
            margin-bottom: 1.25rem;
        }

        @media(max-width:768px) {

            .page-header {
                padding: 1.5rem;
            }

            .page-header h3 {
                font-size: 1.6rem;
            }

            .card-body-custom {
                padding: 1.4rem;
            }
        }
    </style>
@endpush

@section('content')

    <div class="container-fluid px-3 px-md-4 py-4">

        {{-- HEADER --}}
        <div
            class="page-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">

            <div>
                <h3>Edit Paket Kegiatan</h3>
                <p>Perbarui informasi paket wisata, umroh, dan haji.</p>
            </div>

            <a href="{{ route('admin.packages.index') }}" class="btn btn-back">

                <i class="bi bi-arrow-left-circle me-2"></i>
                Kembali

            </a>

        </div>

        {{-- ERROR --}}
        @if ($errors->any())

            <div class="alert alert-danger mb-4">

                <div class="fw-bold mb-2">
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

        {{-- CARD --}}
        <div class="edit-card">

            {{-- HEADER --}}
            <div class="card-header-custom">

                <h5>Form Edit Paket</h5>
                <p>Lengkapi seluruh informasi paket kegiatan dengan benar.</p>

            </div>

            {{-- BODY --}}
            <div class="card-body-custom">

                <form action="{{ route('admin.packages.update', $package->id) }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="row g-4">

                        {{-- NAMA --}}
                        <div class="col-12 col-md-6">

                            <label class="form-label">
                                Nama Paket
                            </label>

                            <input type="text" name="nama_paket" value="{{ old('nama_paket', $package->nama_paket) }}"
                                class="form-control" placeholder="Masukkan nama paket" required>

                        </div>

                        {{-- KATEGORI --}}
                        <div class="col-12 col-md-6">

                            <label class="form-label">
                                Kategori
                            </label>

                            <select name="kategori" class="form-select" required>

                                <option value="wisata"
                                    {{ old('kategori', $package->kategori) == 'wisata' ? 'selected' : '' }}>
                                    Wisata
                                </option>

                                <option value="umroh"
                                    {{ old('kategori', $package->kategori) == 'umroh' ? 'selected' : '' }}>
                                    Umroh
                                </option>

                                <option value="haji"
                                    {{ old('kategori', $package->kategori) == 'haji' ? 'selected' : '' }}>
                                    Haji
                                </option>

                            </select>

                        </div>

                        {{-- DESTINASI --}}
                        <div class="col-12 col-md-6">

                            <label class="form-label">
                                Destinasi
                            </label>

                            <input type="text" name="destinasi" value="{{ old('destinasi', $package->destinasi) }}"
                                class="form-control" placeholder="Contoh: Mekkah & Madinah">

                        </div>

                        {{-- TANGGAL --}}
                        <div class="col-12 col-md-6">

                            <label class="form-label">
                                Tanggal Berlangsung
                            </label>

                            <input type="date" name="tanggal_berlangsung"
                                value="{{ old('tanggal_berlangsung', optional($package->tanggal_berlangsung)->format('Y-m-d')) }}"
                                class="form-control">

                        </div>

                        {{-- HARGA --}}
                        <div class="col-12 col-md-6">

                            <label class="form-label">
                                Harga
                            </label>

                            <input type="number" name="harga" value="{{ old('harga', $package->harga) }}"
                                class="form-control" min="0">

                        </div>

                        {{-- DEPOSIT --}}
                        <div class="col-12 col-md-6">

                            <label class="form-label">
                                Deposit
                            </label>

                            <input type="number" name="deposit" value="{{ old('deposit', $package->deposit) }}"
                                class="form-control" min="0">

                        </div>

                        {{-- DURASI --}}
                        <div class="col-12">

                            <label class="form-label">
                                Durasi
                            </label>

                            <input type="text" name="durasi" value="{{ old('durasi', $package->durasi) }}"
                                class="form-control" placeholder="Contoh: 9 Hari 8 Malam">

                        </div>

                        {{-- GAMBAR --}}
                        <div class="col-12">

                            <label class="form-label">
                                Upload Gambar Paket
                            </label>

                            <input type="file" name="image" class="form-control" accept="image/*">

                            <small class="text-muted">
                                Format: JPG, JPEG, PNG
                            </small>

                            {{-- Preview gambar lama --}}
                            <div class="mt-3">
                                <img src="{{ $package->image_url }}" class="image-preview" alt="Preview Gambar">
                            </div>

                        </div>

                        {{-- DESKRIPSI --}}
                        <div class="col-12">

                            <label class="form-label">
                                Deskripsi Paket
                            </label>

                            <textarea name="deskripsi" class="form-control" placeholder="Masukkan deskripsi paket">{{ old('deskripsi', $package->deskripsi) }}</textarea>

                        </div>

                        {{-- RUNDOWN --}}
                        <div class="col-12">

                            <label class="form-label">
                                Rundown Kegiatan
                            </label>

                            <textarea name="rundown" class="form-control" placeholder="Masukkan rundown kegiatan">{{ old('rundown', $package->rundown) }}</textarea>

                        </div>

                        {{-- ACTIVE --}}
                        <div class="col-12">

                            <div class="form-check d-flex align-items-center">

                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active"
                                    value="1" {{ old('is_active', $package->is_active) ? 'checked' : '' }}>

                                <label class="form-check-label" for="is_active">

                                    Aktifkan Paket

                                </label>

                            </div>

                        </div>

                        {{-- BUTTON --}}
                        <div class="col-12 text-end">

                            <button type="submit" class="btn btn-update-package">

                                <i class="bi bi-check-circle-fill me-2"></i>
                                Perbarui Paket

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

@endsection
