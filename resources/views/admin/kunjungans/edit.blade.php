@extends('admin.layouts.app')

@section('title', 'Edit Kunjungan')

@section('content')
    <div class="container-fluid px-3 px-md-4 py-4">
        <div class="page-header d-flex flex-column flex-md-row justify-content-between align-items-start gap-3">
            <div>
                <h3>Edit Kunjungan</h3>
                <p class="text-muted">Perbarui data kunjungan.</p>
            </div>
            <a href="{{ route('admin.kunjungans.index') }}" class="btn btn-outline-secondary">Kembali ke daftar</a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow-sm mt-3">
            <div class="card-body">
                <form action="{{ route('admin.kunjungans.update', $kunjungan) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <label class="form-label">Tempat</label>
                            <input type="text" name="tempat" value="{{ old('tempat', $kunjungan->tempat) }}"
                                class="form-control" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">Pimpinan</label>
                            <input type="text" name="pimpinan" value="{{ old('pimpinan', $kunjungan->pimpinan) }}"
                                class="form-control" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">No HP</label>
                            <input type="text" name="no_hp" value="{{ old('no_hp', $kunjungan->no_hp) }}"
                                class="form-control" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">Tanggal</label>
                            <input type="date" name="tanggal"
                                value="{{ old('tanggal', $kunjungan->tanggal->format('Y-m-d')) }}" class="form-control"
                                required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Keterangan</label>
                            <textarea name="keterangan" rows="4" class="form-control">{{ old('keterangan', $kunjungan->keterangan) }}</textarea>
                        </div>
                        <div class="col-12 text-end">
                            <button class="btn btn-primary">Perbarui Kunjungan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
