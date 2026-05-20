@extends('admin.layouts.app')

@section('title', 'Edit Calon Peserta')

@section('content')
    <div class="container-fluid px-3 px-md-4 py-4">
        <div class="page-header d-flex flex-column flex-md-row justify-content-between align-items-start gap-3">
            <div>
                <h3>Edit Calon Peserta</h3>
                <p class="text-muted">Perbarui data calon peserta.</p>
            </div>
            <a href="{{ route('admin.calons.index') }}" class="btn btn-outline-secondary">Kembali ke daftar</a>
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
                <form action="{{ route('admin.calons.update', $calon) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap"
                                value="{{ old('nama_lengkap', $calon->nama_lengkap) }}" class="form-control" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" value="{{ old('email', $calon->email) }}"
                                class="form-control" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">Telepon</label>
                            <input type="text" name="no_telepon" value="{{ old('no_telepon', $calon->no_telepon) }}"
                                class="form-control" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">Umur</label>
                            <input type="number" name="umur" value="{{ old('umur', $calon->umur) }}"
                                class="form-control" min="0">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" rows="3" class="form-control">{{ old('alamat', $calon->alamat) }}</textarea>
                        </div>
                        <div class="col-12 col-md-4">
                            <label class="form-label">Jenis Perjalanan</label>
                            <select name="jenis_perjalanan" class="form-select" required>
                                <option value="wisata"
                                    {{ old('jenis_perjalanan', $calon->jenis_perjalanan) === 'wisata' ? 'selected' : '' }}>
                                    Wisata</option>
                                <option value="umroh"
                                    {{ old('jenis_perjalanan', $calon->jenis_perjalanan) === 'umroh' ? 'selected' : '' }}>
                                    Umroh</option>
                                <option value="haji"
                                    {{ old('jenis_perjalanan', $calon->jenis_perjalanan) === 'haji' ? 'selected' : '' }}>
                                    Haji</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-4">
                            <label class="form-label">Tanggal Berangkat</label>
                            <input type="date" name="tanggal_berangkat"
                                value="{{ old('tanggal_berangkat', $calon->tanggal_berangkat?->format('Y-m-d')) }}"
                                class="form-control">
                        </div>
                        <div class="col-12 col-md-4">
                            <label class="form-label">Paket</label>
                            <select name="package_kegiatan_id" class="form-select" required>
                                @foreach ($packages as $package)
                                    <option value="{{ $package->id }}"
                                        {{ old('package_kegiatan_id', $calon->package_kegiatan_id) == $package->id ? 'selected' : '' }}>
                                        {{ $package->nama_paket }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">No Paspor</label>
                            <input type="text" name="no_paspor" value="{{ old('no_paspor', $calon->no_paspor) }}"
                                class="form-control">
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">No KTP</label>
                            <input type="text" name="no_ktp" value="{{ old('no_ktp', $calon->no_ktp) }}"
                                class="form-control">
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">No KK</label>
                            <input type="text" name="no_kk" value="{{ old('no_kk', $calon->no_kk) }}"
                                class="form-control">
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">Akta Kelahiran</label>
                            <input type="text" name="akta_kelahiran"
                                value="{{ old('akta_kelahiran', $calon->akta_kelahiran) }}" class="form-control">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Catatan</label>
                            <textarea name="catatan" rows="3" class="form-control">{{ old('catatan', $calon->catatan) }}</textarea>
                        </div>
                        <div class="col-12 text-end">
                            <button class="btn btn-primary">Perbarui Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
