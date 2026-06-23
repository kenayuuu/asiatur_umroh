@extends('admin.layouts.app')

@section('title', 'Detail Calon Peserta')

@section('content')
    <div class="container-fluid px-3 px-md-4 py-4">
        <div class="page-header d-flex flex-column flex-md-row justify-content-between align-items-start gap-3">
            <div>
                <h3>Detail Calon Peserta</h3>
                <p class="text-muted">{{ $calon->nama_lengkap }}</p>
            </div>
            <a href="{{ route('admin.calons.index') }}" class="btn btn-outline-secondary">Kembali</a>
        </div>

        <div class="card shadow-sm mt-3">
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-4">Nama Lengkap</dt>
                    <dd class="col-sm-8">{{ $calon->nama_lengkap }}</dd>

                    <dt class="col-sm-4">Email</dt>
                    <dd class="col-sm-8">{{ $calon->email }}</dd>

                    <dt class="col-sm-4">Telepon</dt>
                    <dd class="col-sm-8">{{ $calon->no_telepon }}</dd>

                    {{-- <dt class="col-sm-4">Jenis Perjalanan</dt>
                    <dd class="col-sm-8">{{ ucfirst($calon->jenis_perjalanan) }}</dd> --}}

                    <dt class="col-sm-4">Paket</dt>
                    <dd class="col-sm-8">{{ $calon->packageKegiatan?->nama_paket ?? '-' }}</dd>

                    <dt class="col-sm-4">Tanggal Berangkat</dt>
                    <dd class="col-sm-8">{{ $calon->tanggal_berangkat?->format('d M Y') ?? '-' }}</dd>

                    <dt class="col-sm-4">Umur</dt>
                    <dd class="col-sm-8">{{ $calon->umur ?? '-' }}</dd>

                    <dt class="col-sm-4">Alamat</dt>
                    <dd class="col-sm-8">{{ $calon->alamat ?: '-' }}</dd>

                    <dt class="col-sm-4">No Paspor</dt>
                    <dd class="col-sm-8">{{ $calon->no_paspor ?: '-' }}</dd>

                    <dt class="col-sm-4">No KTP</dt>
                    <dd class="col-sm-8">{{ $calon->no_ktp ?: '-' }}</dd>

                    <dt class="col-sm-4">No KK</dt>
                    <dd class="col-sm-8">{{ $calon->no_kk ?: '-' }}</dd>

                    <dt class="col-sm-4">Akta Kelahiran</dt>
                    <dd class="col-sm-8">{{ $calon->akta_kelahiran ?: '-' }}</dd>

                    <dt class="col-sm-4">Catatan</dt>
                    <dd class="col-sm-8">{{ $calon->catatan ?: '-' }}</dd>
                </dl>
            </div>
        </div>
    </div>
@endsection
