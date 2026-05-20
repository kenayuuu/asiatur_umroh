@extends('admin.layouts.app')

@section('title', 'Detail Kunjungan')

@section('content')
    <div class="container-fluid px-3 px-md-4 py-4">
        <div class="page-header d-flex flex-column flex-md-row justify-content-between align-items-start gap-3">
            <div>
                <h3>Detail Kunjungan</h3>
                <p class="text-muted">{{ $kunjungan->tempat }}</p>
            </div>
            <a href="{{ route('admin.kunjungans.index') }}" class="btn btn-outline-secondary">Kembali</a>
        </div>

        <div class="card shadow-sm mt-3">
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-4">Tempat</dt>
                    <dd class="col-sm-8">{{ $kunjungan->tempat }}</dd>

                    <dt class="col-sm-4">Pimpinan</dt>
                    <dd class="col-sm-8">{{ $kunjungan->pimpinan }}</dd>

                    <dt class="col-sm-4">No HP</dt>
                    <dd class="col-sm-8">{{ $kunjungan->no_hp }}</dd>

                    <dt class="col-sm-4">Tanggal</dt>
                    <dd class="col-sm-8">{{ $kunjungan->tanggal->format('d M Y') }}</dd>

                    <dt class="col-sm-4">Keterangan</dt>
                    <dd class="col-sm-8">{{ $kunjungan->keterangan ?: '-' }}</dd>
                </dl>
            </div>
        </div>
    </div>
@endsection
