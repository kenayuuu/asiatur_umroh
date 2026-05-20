@extends('admin.layouts.app')

@section('title', 'Tambah Calon Peserta')

@section('content')
    <div class="container-fluid px-3 px-md-4 py-4">
        <div class="page-header d-flex flex-column flex-md-row justify-content-between align-items-start gap-3">
            <div>
                <h3>Tambah Calon Peserta</h3>
                <p class="text-muted">Tambahkan data calon peserta baru.</p>
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
                <form action="{{ route('admin.calons.store') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" class="form-control"
                                required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">Telepon</label>
                            <input type="text" name="no_telepon" value="{{ old('no_telepon') }}" class="form-control"
                                required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">Umur</label>
                            <input type="number" name="umur" value="{{ old('umur') }}" class="form-control"
                                min="0">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" rows="3" class="form-control">{{ old('alamat') }}</textarea>
                        </div>
                        <div class="col-12 col-md-4">
                            <label class="form-label">Jenis Perjalanan</label>
                            <select name="jenis_perjalanan" class="form-select" required>
                                <option value="wisata" {{ old('jenis_perjalanan') === 'wisata' ? 'selected' : '' }}>Wisata
                                </option>
                                <option value="umroh" {{ old('jenis_perjalanan') === 'umroh' ? 'selected' : '' }}>Umroh
                                </option>
                                <option value="haji" {{ old('jenis_perjalanan') === 'haji' ? 'selected' : '' }}>Haji
                                </option>
                            </select>
                        </div>
                        <div class="col-12 col-md-4">
                            <label class="form-label">Tanggal Berangkat</label>
                            <input type="date" name="tanggal_berangkat" value="{{ old('tanggal_berangkat') }}"
                                class="form-control">
                        </div>
                        <div class="col-12 col-md-4">
                            <label class="form-label">Paket</label>
                            <select name="package_kegiatan_id" class="form-select" required>
                                <option value="">Pilih paket</option>
                                @foreach ($packages as $package)
                                    <option value="{{ $package->id }}"
                                        {{ old('package_kegiatan_id') == $package->id ? 'selected' : '' }}>
                                        {{ $package->nama_paket }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">No Paspor</label>
                            <input type="text" name="no_paspor" value="{{ old('no_paspor') }}" class="form-control">
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">No KTP</label>
                            <input type="text" name="no_ktp" value="{{ old('no_ktp') }}" class="form-control">
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">No KK</label>
                            <input type="text" name="no_kk" value="{{ old('no_kk') }}" class="form-control">
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">Akta Kelahiran</label>
                            <input type="text" name="akta_kelahiran" value="{{ old('akta_kelahiran') }}"
                                class="form-control">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Catatan</label>
                            <textarea name="catatan" rows="3" class="form-control">{{ old('catatan') }}</textarea>
                        </div>
                        <div class="col-12 text-end">
                            <button class="btn btn-primary">Simpan Calon</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
