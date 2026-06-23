@extends('admin.layouts.app')

@section('title', 'Business')

@push('styles')
    <style>
        .page-header {
            background: linear-gradient(135deg, #ff645a, #c60c00);
            border-radius: 1.5rem;
            padding: 2rem;
            color: white;
            box-shadow: 0 10px 25px rgba(198, 12, 0, 0.15);
        }

        .page-header h3 {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: .35rem;
        }

        .page-header p {
            margin: 0;
            color: rgba(255, 255, 255, .85);
        }

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

        .package-card {
            border: none;
            border-radius: 1.5rem;
            overflow: hidden;
            background: white;
            transition: .3s ease;
            box-shadow: 0 4px 18px rgba(0, 0, 0, .06);
            height: 100%;
        }

        .package-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 14px 30px rgba(0, 0, 0, .12);
        }

        .package-link {
            text-decoration: none;
            color: inherit;
        }

        .package-image-wrapper {
            position: relative;
            overflow: hidden;
            height: 220px;
            background: #f3f4f6;
        }

        .package-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            transition: transform .5s ease;
        }

        .package-card:hover .package-image {
            transform: scale(1.06);
        }

        .package-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: rgba(198, 12, 0, .9);
            color: white;
            padding: .45rem .9rem;
            border-radius: 999px;
            font-size: .75rem;
            font-weight: 700;
            backdrop-filter: blur(6px);
        }

        .action-buttons form {
            flex: 1;
        }

        .package-body {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .package-title {
            font-size: 1.2rem;
            font-weight: 800;
            color: #111827;
            margin-bottom: .4rem;
        }

        .package-description {
            color: #4b5563;
            line-height: 1.7;
            font-size: .95rem;
        }

        .package-footer {
            margin-top: auto;
            padding-top: 1.25rem;
        }

        .action-buttons {
            display: flex;
            gap: .75rem;
        }

        .btn-action {
            border-radius: .8rem;
            font-weight: 600;
            padding: .75rem 1rem;
            transition: .25s ease;
            border: none;
            flex: 1;
            display: inline-flex;
            justify-content: center;
            align-items: center;
        }

        .btn-detail {
            background: #eff6ff;
            color: #2563eb;
        }

        .btn-detail:hover {
            background: #2563eb;
            color: white;
        }

        .btn-edit {
            background: #fef3c7;
            color: #b45309;
        }

        .btn-edit:hover {
            background: #f59e0b;
            color: white;
        }

        .btn-delete {
            background: #fee2e2;
            color: #dc2626;
        }

        .btn-delete:hover {
            background: #dc2626;
            color: white;
        }

        .empty-state {
            background: white;
            border-radius: 1.5rem;
            padding: 4rem 2rem;
            text-align: center;
            box-shadow: 0 4px 18px rgba(0, 0, 0, .05);
        }

        .empty-state i {
            font-size: 4rem;
            color: #d1d5db;
            margin-bottom: 1rem;
        }

        .pagination {
            gap: .4rem;
        }

        .pagination .page-link {
            border: none;
            border-radius: .7rem;
            color: #c60c00;
            padding: .7rem 1rem;
            font-weight: 600;
        }

        .pagination .active .page-link {
            background: linear-gradient(135deg, #ff645a, #c60c00);
            color: white;
        }

        @media(max-width:768px) {
            .page-header {
                padding: 1.5rem;
            }

            .page-header h3 {
                font-size: 1.5rem;
            }

            .package-image-wrapper {
                height: 200px;
            }

            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid px-3 px-md-4 py-4">

        <div
            class="page-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
            <div>
                <h3>Business</h3>
                <p>Kelola business dan tampilkan informasi layanan bisnis yang aktif.</p>
            </div>

            <a href="{{ route('admin.businesses.create') }}" class="btn btn-add">
                <i class="bi bi-plus-circle-fill me-2"></i>
                Tambah Business
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success border-0 shadow-sm rounded-4">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
            </div>
        @endif

        <div class="row g-4">
            @forelse($businesses as $business)
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="package-card d-flex flex-column h-100">
                        <div class="package-image-wrapper">
                            <img src="{{ $business->image_url }}" alt="{{ $business->judul }}"
                                class="w-full h-44 object-cover object-center transition duration-500 group-hover:scale-105">
                            <div class="package-badge">
                                {{ $business->is_active ? 'AKTIF' : 'NONAKTIF' }}
                            </div>
                        </div>

                        <div class="package-body">
                            <h5 class="package-title">{{ $business->judul }}</h5>
                            <p class="package-description">{{ Str::limit($business->deskripsi, 120) }}</p>
                        </div>

                        <div class="px-4 pb-4 mt-auto">
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.businesses.show', $business->id) }}"
                                    class="btn btn-action btn-detail flex-fill">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                                <a href="{{ route('admin.businesses.edit', $business->id) }}"
                                    class="btn btn-action btn-edit flex-fill">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.businesses.destroy', $business->id) }}" method="POST"
                                    class="flex-fill" onsubmit="return confirm('Hapus business ini?')">
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
                        <i class="bi bi-folder-minus"></i>
                        <h4 class="mt-3">Tidak ada business</h4>
                        <p class="text-muted">Mulai tambahkan business baru untuk ditampilkan di halaman bisnis.</p>
                    </div>
                </div>
            @endforelse
        </div>

        <div class="mt-4">
            {{ $businesses->links() }}
        </div>
    </div>
@endsection
