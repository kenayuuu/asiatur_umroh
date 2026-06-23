@extends('admin.layouts.app')

@section('title', 'Detail User')

@section('content')
    <div class="container-fluid px-3 px-md-4 py-4">
        <div class="page-header d-flex flex-column flex-md-row justify-content-between align-items-start gap-3">
            <div>
                <h3>Detail User</h3>
                <p class="text-muted">{{ $user->name }}</p>
            </div>
            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">Kembali</a>
        </div>

        <div class="card shadow-sm mt-3">
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-4">Nama Lengkap</dt>
                    <dd class="col-sm-8">{{ $user->name }}</dd>

                    <dt class="col-sm-4">Email</dt>
                    <dd class="col-sm-8">{{ $user->email }}</dd>

                    <dt class="col-sm-4">No Telepon</dt>
                    <dd class="col-sm-8">{{ $user->phone ?: '-' }}</dd>

                    <dt class="col-sm-4">Role</dt>
                    <dd class="col-sm-8">{{ ucfirst($user->role) }}</dd>

                    <dt class="col-sm-4">Alamat</dt>
                    <dd class="col-sm-8">{{ $user->address ?: '-' }}</dd>

                    <dt class="col-sm-4">Dibuat</dt>
                    <dd class="col-sm-8">{{ $user->created_at?->format('d M Y H:i') ?? '-' }}</dd>

                    <dt class="col-sm-4">Terakhir Diperbarui</dt>
                    <dd class="col-sm-8">{{ $user->updated_at?->format('d M Y H:i') ?? '-' }}</dd>
                </dl>
            </div>
        </div>
    </div>
@endsection
