@extends('admin.layouts.app')

@section('title', 'Edit Calon Peserta')

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
                <h3>Edit Calon Peserta</h3>
                <p>Perbarui informasi calon peserta wisata, umroh, dan haji.</p>
            </div>

            <a href="{{ route('admin.calons.index') }}" class="btn btn-back">

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

            {{-- HEADER CARD --}}
            <div class="card-header-custom">

                <h5>Form Edit Calon Peserta</h5>
                <p>Lengkapi dan perbarui data calon peserta dengan benar.</p>

            </div>

            {{-- BODY --}}
            <div class="card-body-custom">

                <form action="{{ route('admin.calons.update', $calon) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="row g-4">

                        {{-- Nama --}}
                        <div class="col-12 col-md-6">

                            <label class="form-label">
                                Nama Lengkap
                            </label>

                            <input type="text" name="nama_lengkap"
                                value="{{ old('nama_lengkap', $calon->nama_lengkap) }}" class="form-control"
                                placeholder="Masukkan nama lengkap" required>

                        </div>

                        {{-- Email --}}
                        <div class="col-12 col-md-6">

                            <label class="form-label">
                                Email
                            </label>

                            <input type="email" name="email" value="{{ old('email', $calon->email) }}"
                                class="form-control" placeholder="Masukkan email" required>

                        </div>

                        {{-- Telepon --}}
                        <div class="col-12 col-md-6">

                            <label class="form-label">
                                Nomor Telepon
                            </label>

                            <input type="text" name="no_telepon" value="{{ old('no_telepon', $calon->no_telepon) }}"
                                class="form-control" placeholder="Masukkan nomor telepon" required>

                        </div>

                        {{-- Umur --}}
                        <div class="col-12 col-md-6">

                            <label class="form-label">
                                Umur
                            </label>

                            <input type="number" name="umur" value="{{ old('umur', $calon->umur) }}"
                                class="form-control" min="0">

                        </div>

                        {{-- Alamat --}}
                        <div class="col-12">

                            <label class="form-label">
                                Alamat
                            </label>

                            <textarea name="alamat" class="form-control" rows="4" placeholder="Masukkan alamat">{{ old('alamat', $calon->alamat) }}</textarea>

                        </div>

                        {{-- Jenis Perjalanan --}}
                        <div class="col-12 col-md-4">

                            <label class="form-label">
                                Jenis Perjalanan
                            </label>

                            <select name="jenis_perjalanan" class="form-select" required>

                                <option value="wisata"
                                    {{ old('jenis_perjalanan', $calon->jenis_perjalanan) == 'wisata' ? 'selected' : '' }}>
                                    Wisata
                                </option>

                                <option value="umroh"
                                    {{ old('jenis_perjalanan', $calon->jenis_perjalanan) == 'umroh' ? 'selected' : '' }}>
                                    Umroh
                                </option>

                                <option value="haji"
                                    {{ old('jenis_perjalanan', $calon->jenis_perjalanan) == 'haji' ? 'selected' : '' }}>
                                    Haji
                                </option>

                            </select>

                        </div>

                        {{-- Tanggal --}}
                        <div class="col-12 col-md-4">

                            <label class="form-label">
                                Tanggal Berangkat
                            </label>

                            <input type="date" name="tanggal_berangkat"
                                value="{{ old('tanggal_berangkat', $calon->tanggal_berangkat?->format('Y-m-d')) }}"
                                class="form-control">

                        </div>

                        {{-- Paket --}}
                        <div class="col-12 col-md-4">

                            <label class="form-label">
                                Paket Kegiatan
                            </label>

                            <select name="package_kegiatan_id" class="form-select" required>

                                @foreach ($packages as $package)
                                    <option value="{{ $package->id }}"
                                        {{ old('package_kegiatan_id', $calon->package_kegiatan_id) == $package->id ? 'selected' : '' }}>
                                        {{ $package->nama_paket }}
                                    </option>
                                @endforeach

                            </select>

                        </div>

                        {{-- Paspor --}}
                        <div class="col-12 col-md-6">

                            <label class="form-label">
                                Nomor Paspor
                            </label>

                            <input type="text" name="no_paspor" value="{{ old('no_paspor', $calon->no_paspor) }}"
                                class="form-control">

                        </div>

                        {{-- KTP --}}
                        <div class="col-12 col-md-6">

                            <label class="form-label">
                                Nomor KTP
                            </label>

                            <input type="text" name="no_ktp" value="{{ old('no_ktp', $calon->no_ktp) }}"
                                class="form-control">

                        </div>

                        {{-- KK --}}
                        <div class="col-12 col-md-6">

                            <label class="form-label">
                                Nomor KK
                            </label>

                            <input type="text" name="no_kk" value="{{ old('no_kk', $calon->no_kk) }}"
                                class="form-control">

                        </div>

                        {{-- Akta --}}
                        <div class="col-12 col-md-6">

                            <label class="form-label">
                                Akta Kelahiran
                            </label>

                            <input type="text" name="akta_kelahiran"
                                value="{{ old('akta_kelahiran', $calon->akta_kelahiran) }}" class="form-control">

                        </div>

                        {{-- Catatan --}}
                        <div class="col-12">

                            <label class="form-label">
                                Catatan
                            </label>

                            <textarea name="catatan" class="form-control" rows="5" placeholder="Masukkan catatan tambahan">{{ old('catatan', $calon->catatan) }}</textarea>

                        </div>

                        {{-- BUTTON --}}
                        <div class="col-12 text-end">

                            <button type="submit" class="btn btn-update-package">

                                <i class="bi bi-check-circle-fill me-2"></i>
                                Perbarui Data

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

@endsection
