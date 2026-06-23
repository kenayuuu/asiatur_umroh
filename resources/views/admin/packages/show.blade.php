@extends('admin.layouts.app')

@section('title', 'Detail Paket Kegiatan')

@section('content')
    <div class="container-fluid px-3 px-md-4 py-4">
        <div class="page-header d-flex flex-column flex-md-row justify-content-between align-items-start gap-3">
            <div>
                <h3>Detail Paket</h3>
                <p class="text-muted">{{ $package->nama_paket }}</p>
            </div>
            <a href="{{ route('admin.packages.index') }}" class="btn btn-outline-secondary">Kembali</a>
        </div>

        <div class="row g-4 mt-3">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4>{{ $package->nama_paket }}</h4>
                        <p class="text-muted mb-2">Kategori: {{ ucfirst($package->kategori) }}</p>
                        <p>{{ $package->deskripsi }}</p>
                        <p><strong>Destinasi:</strong> {{ $package->destinasi }}</p>
                        <p><strong>Tanggal:</strong> {{ $package->tanggal_berlangsung?->format('d M Y') ?? 'TBA' }}</p>
                        <p><strong>Harga:</strong> Rp {{ number_format($package->harga, 0, ',', '.') }}</p>
                        <p><strong>Deposit:</strong>
                            {{ $package->deposit ? 'Rp ' . number_format($package->deposit, 0, ',', '.') : 'Tidak wajib' }}
                        </p>
                        <p><strong>Durasi:</strong> {{ $package->durasi ?? 'TBA' }}</p>
                        <h5 class="mt-4">Rundown</h5>
                        <p class="text-muted">{{ $package->rundown }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow-sm mb-4">
                    <img src="{{ $package->image_url }}" class="card-img-top" alt="{{ $package->nama_paket }}">
                    <div class="card-body">
                        <p><strong>Status:</strong> {{ $package->is_active ? 'Aktif' : 'Tidak Aktif' }}</p>
                        <p><strong>Jumlah Calon:</strong> {{ $package->calons->count() }}</p>
                        <a href="{{ route('admin.packages.edit', $package) }}" class="btn btn-warning w-100 mb-2">Edit
                            Paket</a>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5>Calon Peserta</h5>
                        @forelse($calons as $calon)
                            <div class="border rounded-3 p-3 mb-3">
                                <p class="mb-1"><strong>{{ $calon->nama_lengkap }}</strong></p>
                                <p class="mb-1 text-muted">{{ ucfirst($calon->jenis_perjalanan) }} •
                                    {{ $calon->tanggal_berangkat?->format('d M Y') ?? 'Belum ditentukan' }}</p>
                                <a href="{{ route('admin.calons.show', $calon) }}"
                                    class="btn btn-sm btn-outline-primary">Detail</a>
                            </div>
                        @empty
                            <p class="text-muted">Belum ada calon peserta untuk paket ini.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
