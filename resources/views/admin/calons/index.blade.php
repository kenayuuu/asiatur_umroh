@extends('admin.layouts.app')

@section('title', 'Data Calon Peserta')

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

        <div
            class="page-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">

            <div>
                <h3>Data Calon Peserta</h3>
                <p>Kelola data calon peserta wisata, umroh, dan haji secara mudah dan terorganisir.</p>
            </div>

            <a href="{{ route('admin.calons.create') }}" class="btn btn-add">
                <i class="bi bi-plus-circle-fill me-2"></i>
                Tambah Calon
            </a>

        </div>

        {{-- ALERT --}}
        @if (session('success'))
            <div class="alert alert-success border-0 shadow-sm rounded-4">

                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}

            </div>
        @endif

        <div class="d-flex flex-column flex-md-row justify-content-between gap-3 align-items-start mb-4">
            <form action="{{ route('admin.calons.index') }}" method="GET"
                class="d-flex gap-2 flex-column flex-sm-row align-items-start align-items-sm-center">
                <div class="input-group">
                    <label class="input-group-text" for="package_id">Paket Kegiatan</label>
                    <select name="package_id" id="package_id" class="form-select">
                        <option value="">Semua Paket</option>
                        @foreach ($packages as $package)
                            <option value="{{ $package->id }}"
                                {{ isset($selectedPackageId) && $selectedPackageId == $package->id ? 'selected' : '' }}>
                                {{ $package->nama_paket }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-outline-primary">Filter</button>
                    <a href="{{ route('admin.calons.index') }}" class="btn btn-outline-secondary">Reset</a>
                </div>
            </form>

            <div>
                <a href="{{ route('admin.calons.exportPdf', array_filter(['package_id' => $selectedPackageId])) }}"
                    class="btn btn-primary pdf-btn">
                    <i class="bi bi-file-earmark-pdf-fill me-2"></i>
                    Download PDF
                </a>
            </div>
        </div>

        {{-- TABLE --}}
        <div class="table-card">

            <div class="table-responsive">

                <table class="table custom-table align-middle mb-0">

                    <thead>

                        <tr>

                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Paket</th>
                            {{-- <th>Jenis</th> --}}
                            <th>Tanggal Berangkat</th>
                            <th>No Telepon</th>
                            {{-- <th class="text-center">Status</th> --}}
                            <th class="text-end">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($calons as $index => $calon)
                            <tr>

                                <td>
                                    {{ $calons->firstItem() + $index }}
                                </td>

                                <td>

                                    <div class="d-flex align-items-center gap-3">

                                        <div class="table-avatar">
                                            <i class="bi bi-person-fill"></i>
                                        </div>

                                        <div>

                                            <div class="fw-bold text-dark">
                                                {{ $calon->nama_lengkap }}
                                            </div>

                                            <small class="text-muted">
                                                {{ $calon->email ?? '-' }}
                                            </small>

                                        </div>

                                    </div>

                                </td>

                                <td>
                                    {{ $calon->packageKegiatan?->nama_paket ?? '-' }}
                                </td>

                                {{-- <td>

                                    <span class="badge badge-jenis">

                                        {{ ucfirst($calon->jenis_perjalanan) }}

                                    </span>

                                </td> --}}

                                <td>

                                    {{ $calon->tanggal_berangkat?->format('d M Y') ?? '-' }}

                                </td>

                                <td>

                                    {{ $calon->no_telepon }}

                                </td>

                                {{-- <td class="text-center">

                                    @if ($calon->is_active)
                                        <span class="badge badge-active">
                                            Aktif
                                        </span>
                                    @else
                                        <span class="badge badge-nonactive">
                                            Nonaktif
                                        </span>
                                    @endif

                                </td> --}}

                                <td>

                                    <div class="action-buttons justify-content-end">

                                        {{-- DETAIL --}}
                                        <a href="{{ route('admin.calons.show', $calon->id) }}"
                                            class="btn btn-action btn-detail">

                                            <i class="bi bi-eye-fill"></i>

                                        </a>

                                        {{-- EDIT --}}
                                        <a href="{{ route('admin.calons.edit', $calon->id) }}"
                                            class="btn btn-action btn-edit">

                                            <i class="bi bi-pencil-square"></i>

                                        </a>

                                        {{-- DELETE --}}
                                        <form action="{{ route('admin.calons.destroy', $calon->id) }}" method="POST"
                                            onsubmit="return confirm('Hapus data calon peserta?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-action btn-delete">

                                                <i class="bi bi-trash-fill"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="8">

                                    <div class="empty-table-state">

                                        <i class="bi bi-people-fill"></i>

                                        <h5>
                                            Belum Ada Data
                                        </h5>

                                        <p>
                                            Data calon peserta belum tersedia.
                                        </p>

                                    </div>

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        {{-- PAGINATION --}}
        @if ($calons->hasPages())
            <div class="mt-5 d-flex justify-content-center">
                {{ $calons->links() }}
            </div>
        @endif

    </div>

@endsection
