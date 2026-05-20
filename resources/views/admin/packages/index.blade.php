@extends('admin.layouts.app')

@section('title', 'Paket Kegiatan')

@section('content')
    <div class="container-fluid px-3 px-md-4 py-4">
        <div class="page-header d-flex flex-column flex-md-row justify-content-between align-items-start gap-3">
            <div>
                <h3>Paket Kegiatan</h3>
                <p class="text-muted">Kelola paket wisata, umroh, dan haji.</p>
            </div>
            <a href="{{ route('admin.packages.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-2"></i>Tambah Paket
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row g-3 g-md-4 mt-3">
            @forelse($packages as $package)
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="card h-100 shadow-sm">
                        @if ($package->image)
                            <img src="{{ asset('storage/' . $package->image) }}" class="card-img-top"
                                style="height:220px;object-fit:cover" alt="{{ $package->nama_paket }}">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $package->nama_paket }}</h5>
                            <p class="card-text text-muted mb-3">{{ $package->destinasi }}</p>
                            <p class="mb-3">{{ Str::limit($package->deskripsi, 100) }}</p>
                            <div class="mt-auto d-flex gap-2 flex-wrap">
                                <a href="{{ route('admin.packages.show', $package) }}"
                                    class="btn btn-outline-primary btn-sm flex-fill">Detail</a>
                                <a href="{{ route('admin.packages.edit', $package) }}"
                                    class="btn btn-warning btn-sm flex-fill">Edit</a>
                                <form action="{{ route('admin.packages.destroy', $package) }}" method="POST"
                                    class="flex-fill" onsubmit="return confirm('Hapus paket ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm w-100">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">Belum ada paket kegiatan.</div>
                </div>
            @endforelse
        </div>

        <div class="mt-4 d-flex justify-content-center">
            {{ $packages->links() }}
        </div>
    </div>
@endsection
