@extends('admin.layouts.app')

@section('title', 'Tambah Paket Kegiatan')

@section('content')
    <div class="container-fluid px-3 px-md-4 py-4">
        <div class="page-header d-flex flex-column flex-md-row justify-content-between align-items-start gap-3">
            <div>
                <h3>Tambah Paket Kegiatan</h3>
                <p class="text-muted">Tambahkan paket wisata, umroh, atau haji baru.</p>
            </div>
            <a href="{{ route('admin.packages.index') }}" class="btn btn-outline-secondary">Kembali ke daftar</a>
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
                <form action="{{ route('admin.packages.store') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <label class="form-label">Nama Paket</label>
                            <input type="text" name="nama_paket" value="{{ old('nama_paket') }}" class="form-control"
                                required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">Kategori</label>
                            <select name="kategori" class="form-select" required>
                                <option value="wisata" {{ old('kategori') === 'wisata' ? 'selected' : '' }}>Wisata</option>
                                <option value="umroh" {{ old('kategori') === 'umroh' ? 'selected' : '' }}>Umroh</option>
                                <option value="haji" {{ old('kategori') === 'haji' ? 'selected' : '' }}>Haji</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">Destinasi</label>
                            <input type="text" name="destinasi" value="{{ old('destinasi') }}" class="form-control"
                                required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">Tanggal Berlangsung</label>
                            <input type="date" name="tanggal_berlangsung" value="{{ old('tanggal_berlangsung') }}"
                                class="form-control">
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">Harga</label>
                            <input type="number" name="harga" value="{{ old('harga', 0) }}" class="form-control"
                                min="0" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">Deposit</label>
                            <input type="number" name="deposit" value="{{ old('deposit') }}" class="form-control"
                                min="0">
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">Durasi</label>
                            <input type="text" name="durasi" value="{{ old('durasi') }}" class="form-control"
                                placeholder="Misal: 7 Hari 6 Malam">
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">URL Gambar</label>
                            <input type="text" name="image" value="{{ old('image') }}" class="form-control"
                                placeholder="Masukkan path storage atau URL gambar">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Deskripsi Paket</label>
                            <textarea name="deskripsi" rows="5" class="form-control">{{ old('deskripsi') }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Rundown</label>
                            <textarea name="rundown" rows="5" class="form-control">{{ old('rundown') }}</textarea>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active"
                                    {{ old('is_active') ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">Aktifkan paket</label>
                            </div>
                        </div>
                        <div class="col-12 text-end">
                            <button class="btn btn-primary">Simpan Paket</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
