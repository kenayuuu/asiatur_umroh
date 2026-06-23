@extends('admin.layouts.app')

@section('title', 'Kunjungan')

@push('styles')
    <style>
        .btn-add {
            background: white;
            color: #c60c00;
            border: none;
            border-radius: .9rem;
            padding: .85rem 1.4rem;
            font-weight: 700;
            transition: .3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, .12);
        }

        .btn-add:hover {
            transform: translateY(-2px);
            background: #fff5f5;
            color: #c60c00;
        }

        .pdf-btn {
            background: linear-gradient(135deg, #ff645a, #c60c00);
            border: none;
            color: #fff;
            transition: all .3s ease;
        }

        .pdf-btn:hover,
        .pdf-btn:focus,
        .pdf-btn:active {
            background: linear-gradient(135deg, #ff7b73, #a80000);
            color: #fff !important;
            border: none;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(198, 12, 0, .25);
        }
    </style>
@endpush

@vite('resources/css/admin-calon.css')

@section('content')

    <div class="container-fluid px-3 px-md-4 py-4">

        {{-- HEADER --}}
        <div
            class="page-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">

            <div>
                <h3>Kunjungan</h3>
                <p>
                    Kelola kunjungan promosi dan tempat yang pernah dikunjungi ASIATUR.
                </p>
            </div>

            <div class="d-flex flex-column flex-md-row gap-2 align-items-start">
                <a href="{{ route('admin.kunjungans.create') }}" class="btn btn-add">
                    <i class="bi bi-plus-circle-fill me-2"></i>
                    Tambah Kunjungan
                </a>
            </div>

        </div>

        {{-- ALERT --}}
        @if (session('success'))
            <div class="alert alert-success shadow-sm rounded-4 border-0">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex flex-column flex-md-row right-content-between gap-3 align-items-start mb-4">
            <a href="{{ route('admin.kunjungans.exportPdf') }}" class="btn btn-primary pdf-btn">
                <i class="bi bi-file-earmark-pdf-fill me-2"></i>
                Download PDF
            </a>
        </div>
        {{-- TABLE CARD --}}
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

            <div class="table-responsive">

                <table class="table align-middle mb-0">

                    <thead>
                        <tr>
                            <th>Tempat</th>
                            <th>Pimpinan</th>
                            <th>No HP</th>
                            <th>Tanggal</th>
                            <th width="180" class="text-center">
                                Aksi
                            </th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($kunjungans as $kunjungan)
                            <tr>

                                <td>
                                    <div class="fw-semibold">
                                        {{ $kunjungan->tempat }}
                                    </div>
                                </td>

                                <td>
                                    {{ $kunjungan->pimpinan }}
                                </td>

                                <td>
                                    {{ $kunjungan->no_hp }}
                                </td>

                                <td>
                                    {{ $kunjungan->tanggal->format('d M Y') }}
                                </td>

                                <td>

                                    <div class="d-flex justify-content-center gap-2">

                                        {{-- DETAIL --}}
                                        <a href="{{ route('admin.kunjungans.show', $kunjungan) }}"
                                            class="btn btn-sm btn-detail">

                                            <i class="bi bi-eye-fill"></i>

                                        </a>

                                        {{-- EDIT --}}
                                        <a href="{{ route('admin.kunjungans.edit', $kunjungan) }}"
                                            class="btn btn-sm btn-edit">

                                            <i class="bi bi-pencil-fill"></i>

                                        </a>

                                        {{-- DELETE --}}
                                        <form action="{{ route('admin.kunjungans.destroy', $kunjungan) }}" method="POST"
                                            onsubmit="return confirm('Hapus kunjungan ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-delete">

                                                <i class="bi bi-trash-fill"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5">

                                    <div class="text-center py-5">

                                        <i class="bi bi-inbox-fill fs-1 text-secondary"></i>

                                        <h5 class="mt-3 fw-bold">
                                            Belum Ada Data Kunjungan
                                        </h5>

                                        <p class="text-muted mb-4">
                                            Data kunjungan belum tersedia.
                                        </p>

                                        <a href="{{ route('admin.kunjungans.create') }}" class="btn btn-primary">

                                            <i class="bi bi-plus-circle me-2"></i>
                                            Tambah Kunjungan

                                        </a>

                                    </div>

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        {{-- PAGINATION --}}
        @if ($kunjungans->hasPages())
            <div class="mt-4 d-flex justify-content-center">
                {{ $kunjungans->links() }}
            </div>
        @endif

    </div>

@endsection
