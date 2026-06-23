@extends('admin.layouts.app')

@section('title', 'Paket Kegiatan')

@vite('resources/css/admin-calon.css')

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
    </style>
@endpush

@section('content')

    <div class="container-fluid px-3 px-md-4 py-4">

        {{-- Header --}}
        <div
            class="page-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">

            <div>
                <h3>Paket Kegiatan</h3>
                <p>Kelola paket wisata, umroh, dan haji dengan tampilan modern.</p>
            </div>

            <a href="{{ route('admin.packages.create') }}" class="btn btn-add">
                <i class="bi bi-plus-circle-fill me-2"></i>
                Tambah Paket
            </a>

        </div>

        {{-- Alert --}}
        @if (session('success'))
            <div class="alert alert-success border-0 shadow-sm rounded-4">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
            </div>
        @endif

        {{-- List Paket --}}
        <div class="row g-4">

            @forelse($packages as $package)
                <div class="col-12 col-md-6 col-xl-4">

                    <div class="package-card d-flex flex-column h-100">

                        {{-- Klik menuju detail --}}
                        <a href="{{ route('admin.packages.show', $package->id) }}"
                            class="package-link text-decoration-none">

                            {{-- Gambar --}}
                            <div class="package-image-wrapper">

                                <img src="{{ $package->image_url }}" alt="{{ $package->nama_paket }}"
                                    class="w-full h-44 object-cover object-top transition duration-500 group-hover:scale-105">

                            </div>

                            {{-- Badge --}}
                            <div class="package-badge">
                                {{ strtoupper($package->kategori ?? 'PAKET') }}
                            </div>

                            {{-- Body --}}
                            <div class="package-body">

                                <h5 class="package-title">
                                    {{ $package->nama_paket }}
                                </h5>

                                <div class="package-destination">
                                    <i class="bi bi-geo-alt-fill me-1 text-danger"></i>
                                    {{ $package->destinasi }}
                                </div>

                                <p class="package-description">
                                    {{ Str::limit($package->deskripsi, 110) }}
                                </p>

                            </div>

                        </a>

                        {{-- Tombol --}}
                        <div class="px-4 pb-4 mt-auto">

                            <div class="d-flex gap-2">

                                {{-- Detail --}}
                                <a href="{{ route('admin.packages.show', $package->id) }}"
                                    class="btn btn-action btn-detail flex-fill">

                                    <i class="bi bi-eye-fill"></i>

                                </a>

                                {{-- Edit --}}
                                <a href="{{ route('admin.packages.edit', $package->id) }}"
                                    class="btn btn-action btn-edit flex-fill">

                                    <i class="bi bi-pencil-square"></i>

                                </a>

                                {{-- Delete --}}
                                <form action="{{ route('admin.packages.destroy', $package->id) }}" method="POST"
                                    class="flex-fill" onsubmit="return confirm('Hapus paket ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-action btn-delete w-100">

                                        <i class="bi bi-trash-fill"></i>

                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="empty-state">

                        <i class="bi bi-inbox-fill"></i>

                        <h4 class="fw-bold mb-2">
                            Belum Ada Paket
                        </h4>

                        <p class="text-muted mb-4">
                            Paket wisata, umroh, atau haji belum tersedia.
                        </p>

                        <a href="{{ route('admin.packages.create') }}" class="btn btn-primary rounded-4 px-4 py-2">

                            <i class="bi bi-plus-circle me-2"></i>
                            Tambah Paket Pertama

                        </a>

                    </div>

                </div>
            @endforelse

        </div>

        {{-- Pagination --}}
        @if ($packages->hasPages())
            <div class="mt-5 d-flex justify-content-center">
                {{ $packages->links() }}
            </div>
        @endif

    </div>

@endsection
