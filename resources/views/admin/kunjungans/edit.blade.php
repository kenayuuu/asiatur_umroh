@extends('admin.layouts.app')

@section('title', 'Edit Kunjungan')

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

        .btn-update {
            background: linear-gradient(135deg, #ff645a, #c60c00);
            border: none;
            color: white;
            padding: .95rem 1.8rem;
            border-radius: 1rem;
            font-weight: 700;
            transition: .3s ease;
            box-shadow: 0 10px 20px rgba(198, 12, 0, .22);
        }

        .btn-update:hover {
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
                <h3>Edit Kunjungan</h3>
                <p>Perbarui data kunjungan promosi dan relasi ASIATUR.</p>
            </div>

            <a href="{{ route('admin.kunjungans.index') }}" class="btn btn-back">

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

                <h5>Form Edit Kunjungan</h5>
                <p>Lengkapi dan perbarui data kunjungan dengan benar.</p>

            </div>

            {{-- BODY --}}
            <div class="card-body-custom">

                <form action="{{ route('admin.kunjungans.update', $kunjungan) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="row g-4">

                        {{-- Tempat --}}
                        <div class="col-12 col-md-6">

                            <label class="form-label">
                                Tempat
                            </label>

                            <input type="text" name="tempat" value="{{ old('tempat', $kunjungan->tempat) }}"
                                class="form-control" placeholder="Masukkan nama tempat" required>

                        </div>

                        {{-- Pimpinan --}}
                        <div class="col-12 col-md-6">

                            <label class="form-label">
                                Pimpinan
                            </label>

                            <input type="text" name="pimpinan" value="{{ old('pimpinan', $kunjungan->pimpinan) }}"
                                class="form-control" placeholder="Masukkan nama pimpinan" required>

                        </div>

                        {{-- No HP --}}
                        <div class="col-12 col-md-6">

                            <label class="form-label">
                                Nomor HP
                            </label>

                            <input type="text" name="no_hp" value="{{ old('no_hp', $kunjungan->no_hp) }}"
                                class="form-control" placeholder="Masukkan nomor HP" required>

                        </div>

                        {{-- Tanggal --}}
                        <div class="col-12 col-md-6">

                            <label class="form-label">
                                Tanggal Kunjungan
                            </label>

                            <input type="date" name="tanggal"
                                value="{{ old('tanggal', $kunjungan->tanggal->format('Y-m-d')) }}" class="form-control"
                                required>

                        </div>

                        {{-- Keterangan --}}
                        <div class="col-12">

                            <label class="form-label">
                                Keterangan
                            </label>

                            <textarea name="keterangan" rows="5" class="form-control" placeholder="Masukkan keterangan kunjungan">{{ old('keterangan', $kunjungan->keterangan) }}</textarea>

                        </div>

                        {{-- BUTTON --}}
                        <div class="col-12 text-end">

                            <button type="submit" class="btn btn-update">

                                <i class="bi bi-check-circle-fill me-2"></i>
                                Perbarui Kunjungan

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

@endsection
