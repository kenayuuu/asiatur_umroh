@extends('admin.layouts.app')

@section('title', 'Kunjungan')

@section('content')
    <div class="container-fluid px-3 px-md-4 py-4">
        <div class="page-header d-flex flex-column flex-md-row justify-content-between align-items-start gap-3">
            <div>
                <h3>Kunjungan</h3>
                <p class="text-muted">Kelola kunjungan promosi dan tempat yang pernah dikunjungi ASIATUR.</p>
            </div>
            <a href="{{ route('admin.kunjungans.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-2"></i>Tambah Kunjungan
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive mt-3">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>Tempat</th>
                        <th>Pimpinan</th>
                        <th>No HP</th>
                        <th>Tanggal</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kunjungans as $kunjungan)
                        <tr>
                            <td>{{ $kunjungan->tempat }}</td>
                            <td>{{ $kunjungan->pimpinan }}</td>
                            <td>{{ $kunjungan->no_hp }}</td>
                            <td>{{ $kunjungan->tanggal->format('d M Y') }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.kunjungans.show', $kunjungan) }}"
                                    class="btn btn-sm btn-outline-primary">Detail</a>
                                <a href="{{ route('admin.kunjungans.edit', $kunjungan) }}"
                                    class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.kunjungans.destroy', $kunjungan) }}" method="POST"
                                    class="d-inline" onsubmit="return confirm('Hapus kunjungan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada data kunjungan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4 d-flex justify-content-center">
            {{ $kunjungans->links() }}
        </div>
    </div>
@endsection
