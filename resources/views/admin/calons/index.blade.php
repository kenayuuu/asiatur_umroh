@extends('admin.layouts.app')

@section('title', 'Data Calon Peserta')

@section('content')
    <div class="container-fluid px-3 px-md-4 py-4">
        <div class="page-header d-flex flex-column flex-md-row justify-content-between align-items-start gap-3">
            <div>
                <h3>Data Calon Peserta</h3>
                <p class="text-muted">Kelola calon peserta untuk paket wisata, umroh, dan haji.</p>
            </div>
            <a href="{{ route('admin.calons.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-2"></i>Tambah Calon
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive mt-3">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Paket</th>
                        <th>Jenis</th>
                        <th>Berangkat</th>
                        <th>Telepon</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($calons as $calon)
                        <tr>
                            <td>{{ $calon->nama_lengkap }}</td>
                            <td>{{ $calon->packageKegiatan?->nama_paket ?? '-' }}</td>
                            <td>{{ ucfirst($calon->jenis_perjalanan) }}</td>
                            <td>{{ $calon->tanggal_berangkat?->format('d M Y') ?? '-' }}</td>
                            <td>{{ $calon->no_telepon }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.calons.show', $calon) }}"
                                    class="btn btn-sm btn-outline-primary">Detail</a>
                                <a href="{{ route('admin.calons.edit', $calon) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.calons.destroy', $calon) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Hapus data calon peserta?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada data calon peserta.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4 d-flex justify-content-center">
            {{ $calons->links() }}
        </div>
    </div>
@endsection
