@extends('admin.layouts.app')

@section('title', 'Data Users')

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

@vite('resources/css/admin-calon.css')

@section('content')
    <div class="container-fluid px-3 px-md-4 py-4">

        <div
            class="page-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">

            <div>
                <h3>Data Users</h3>
                <p>Kelola data pengguna dan role admin atau user dengan mudah.</p>
            </div>

            <a href="{{ route('admin.users.create') }}" class="btn btn-add">
                <i class="bi bi-plus-circle-fill me-2"></i>
                Tambah User
            </a>

        </div>

        @if (session('success'))
            <div class="alert alert-success border-0 shadow-sm rounded-4">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
            </div>
        @endif

        <div class="table-card">
            <div class="table-responsive">
                <table class="table custom-table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Role</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $index => $user)
                            <tr>
                                <td>{{ $users->firstItem() + $index }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="table-avatar">
                                            <i class="bi bi-person-fill"></i>
                                        </div>
                                        <div>
                                            <div class="fw-bold text-dark">{{ $user->name }}</div>
                                            <small class="text-muted">{{ $user->email }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone ?? '-' }}</td>
                                <td>{{ ucfirst($user->role) }}</td>
                                <td>
                                    <div class="action-buttons justify-content-end">
                                        <a href="{{ route('admin.users.show', $user->id) }}"
                                            class="btn btn-action btn-detail">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>
                                        <a href="{{ route('admin.users.edit', $user->id) }}"
                                            class="btn btn-action btn-edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                            onsubmit="return confirm('Hapus user ini?')">
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
                                <td colspan="6">
                                    <div class="empty-table-state">
                                        <i class="bi bi-person-lines-fill"></i>
                                        <h5>Belum Ada Data</h5>
                                        <p>Data pengguna belum tersedia.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if ($users->hasPages())
            <div class="mt-5 d-flex justify-content-center">
                {{ $users->links() }}
            </div>
        @endif

    </div>
@endsection
