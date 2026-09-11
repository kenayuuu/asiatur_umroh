@extends('admin.layouts.app')

@section('title', 'Tambah Calon Peserta')

@section('content') <div class="container-fluid px-3 px-md-4 py-4">

        {{-- Header --}}
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">

            <div>
                <h3 class="fw-bold mb-1">Tambah Calon Peserta</h3>
                <p class="text-muted mb-0">
                    Tambahkan data calon peserta wisata, umroh, atau haji baru.
                </p>
            </div>

            <a href="{{ route('admin.calons.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                <i class="bi bi-arrow-left me-2"></i>
                Kembali
            </a>

        </div>

        {{-- Error --}}
        @if ($errors->any())
            <div class="alert alert-danger rounded-4 border-0 shadow-sm">

                <div class="fw-semibold mb-2">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    Terjadi Kesalahan
                </div>

                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>
        @endif

        {{-- Card --}}
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

            {{-- Header --}}
            <div class="card-header border-0 py-4" style="background: linear-gradient(135deg, #FF645A, #C60C00);">

                <h5 class="text-white mb-0 fw-bold">
                    <i class="bi bi-people-fill me-2"></i>
                    Form Tambah Calon Peserta
                </h5>

            </div>

            {{-- Body --}}
            <div class="card-body p-4 p-md-5">

                <form action="{{ route('admin.calons.store') }}" method="POST">

                    @csrf
                    {{-- Pilih dari Calon Cadangan --}}
                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            Pendaftaran Website
                        </label>

                        <select name="calon_cadangan_id" id="calon_cadangan_id"
                            class="form-select form-select-lg rounded-3">

                            <option value="">
                                -- Input calon baru secara manual --
                            </option>

                            @foreach ($calonCadangan as $cadangan)
                                <option value="{{ $cadangan->id }}" data-nama="{{ $cadangan->nama_lengkap }}"
                                    data-email="{{ $cadangan->email }}" data-telepon="{{ $cadangan->no_telepon }}"
                                    data-umur="{{ $cadangan->umur }}" data-alamat="{{ $cadangan->alamat }}"
                                    data-ktp="{{ $cadangan->no_ktp }}" data-kk="{{ $cadangan->no_kk }}"
                                    data-paspor="{{ $cadangan->no_paspor }}" data-akta="{{ $cadangan->akta_kelahiran }}"
                                    data-jenis="{{ $cadangan->jenis_perjalanan }}"
                                    data-tanggal="{{ $cadangan->tanggal_berangkat?->format('Y-m-d') }}"
                                    data-package="{{ $cadangan->package_kegiatan_id }}"
                                    data-catatan="{{ $cadangan->catatan }}">
                                    {{ $cadangan->nama_lengkap }}
                                    — {{ $cadangan->no_telepon }}
                                </option>
                            @endforeach

                        </select>

                        <small class="text-muted">
                            Pilih data pendaftaran dari website untuk mengisi formulir secara otomatis.
                        </small>

                    </div>
                    <div class="row g-4">

                        {{-- Nama --}}
                        <div class="col-12 col-md-6">
                            <label class="form-label fw-semibold">
                                Nama Lengkap
                            </label>

                            <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}"
                                class="form-control form-control-lg rounded-3" required>
                        </div>

                        {{-- Email --}}
                        <div class="col-12 col-md-6">
                            <label class="form-label fw-semibold">
                                Email
                            </label>

                            <input type="email" name="email" value="{{ old('email') }}"
                                class="form-control form-control-lg rounded-3" required>
                        </div>

                        {{-- Telepon --}}
                        <div class="col-12 col-md-6">
                            <label class="form-label fw-semibold">
                                No Telepon
                            </label>

                            <input type="text" name="no_telepon" value="{{ old('no_telepon') }}"
                                class="form-control form-control-lg rounded-3" required>
                        </div>

                        {{-- Umur --}}
                        <div class="col-12 col-md-6">
                            <label class="form-label fw-semibold">
                                Umur
                            </label>

                            <input type="number" name="umur" value="{{ old('umur') }}"
                                class="form-control form-control-lg rounded-3" min="0">
                        </div>

                        {{-- Alamat --}}
                        <div class="col-12">
                            <label class="form-label fw-semibold">
                                Alamat
                            </label>

                            <textarea name="alamat" rows="4" class="form-control rounded-3">{{ old('alamat') }}</textarea>
                        </div>

                        {{-- Jenis Perjalanan --}}
                        <div class="col-12 col-md-4">
                            <label class="form-label fw-semibold">
                                Jenis Perjalanan
                            </label>

                            <select name="jenis_perjalanan" class="form-select form-select-lg rounded-3" required>

                                <option value="">Pilih Jenis</option>

                                <option value="wisata" {{ old('jenis_perjalanan') === 'wisata' ? 'selected' : '' }}>
                                    Wisata
                                </option>

                                <option value="umroh" {{ old('jenis_perjalanan') === 'umroh' ? 'selected' : '' }}>
                                    Umroh
                                </option>

                                <option value="haji" {{ old('jenis_perjalanan') === 'haji' ? 'selected' : '' }}>
                                    Haji
                                </option>

                            </select>
                        </div>

                        {{-- Tanggal Berangkat --}}
                        <div class="col-12 col-md-4">
                            <label class="form-label fw-semibold">
                                Tanggal Berangkat
                            </label>

                            <input type="date" name="tanggal_berangkat" value="{{ old('tanggal_berangkat') }}"
                                class="form-control form-control-lg rounded-3">
                        </div>

                        {{-- Paket --}}
                        <div class="col-12 col-md-4">
                            <label class="form-label fw-semibold">
                                Paket Kegiatan
                            </label>

                            <select name="package_kegiatan_id" class="form-select form-select-lg rounded-3" required>

                                <option value="">
                                    Pilih Paket
                                </option>

                                @foreach ($packages as $package)
                                    <option value="{{ $package->id }}"
                                        {{ old('package_kegiatan_id') == $package->id ? 'selected' : '' }}>
                                        {{ $package->nama_paket }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        {{-- No Paspor --}}
                        <div class="col-12 col-md-4">
                            <label class="form-label fw-semibold">
                                No Paspor
                            </label>

                            <input type="text" name="no_paspor" value="{{ old('no_paspor') }}"
                                class="form-control form-control-lg rounded-3">
                        </div>

                        {{-- No KTP --}}
                        <div class="col-12 col-md-4">
                            <label class="form-label fw-semibold">
                                No KTP
                            </label>

                            <input type="text" name="no_ktp" value="{{ old('no_ktp') }}"
                                class="form-control form-control-lg rounded-3">
                        </div>

                        {{-- No KK --}}
                        <div class="col-12 col-md-4">
                            <label class="form-label fw-semibold">
                                No KK
                            </label>

                            <input type="text" name="no_kk" value="{{ old('no_kk') }}"
                                class="form-control form-control-lg rounded-3">
                        </div>

                        {{-- Akta --}}
                        <div class="col-12">
                            <label class="form-label fw-semibold">
                                Akta Kelahiran
                            </label>

                            <input type="text" name="akta_kelahiran" value="{{ old('akta_kelahiran') }}"
                                class="form-control form-control-lg rounded-3">
                        </div>

                        {{-- Catatan --}}
                        <div class="col-12">
                            <label class="form-label fw-semibold">
                                Catatan
                            </label>

                            <textarea name="catatan" rows="5" class="form-control rounded-3">{{ old('catatan') }}</textarea>
                        </div>

                        {{-- Tombol --}}
                        <div class="col-12 text-end">

                            <button type="submit" class="btn btn-lg text-white px-5 rounded-pill shadow"
                                style="background: linear-gradient(135deg, #FF645A, #C60C00);">

                                <i class="bi bi-save2 me-2"></i>
                                Simpan Calon

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const dropdown = document.getElementById('calon_cadangan_id');

            if (!dropdown) {
                return;
            }

            dropdown.addEventListener('change', function() {

                const option = this.options[this.selectedIndex];

                if (!option.value) {
                    return;
                }

                document.querySelector('[name="nama_lengkap"]').value =
                    option.dataset.nama || '';

                document.querySelector('[name="email"]').value =
                    option.dataset.email || '';

                document.querySelector('[name="no_telepon"]').value =
                    option.dataset.telepon || '';

                document.querySelector('[name="umur"]').value =
                    option.dataset.umur || '';

                document.querySelector('[name="alamat"]').value =
                    option.dataset.alamat || '';

                document.querySelector('[name="no_ktp"]').value =
                    option.dataset.ktp || '';

                document.querySelector('[name="no_kk"]').value =
                    option.dataset.kk || '';

                document.querySelector('[name="no_paspor"]').value =
                    option.dataset.paspor || '';

                document.querySelector('[name="akta_kelahiran"]').value =
                    option.dataset.akta || '';

                document.querySelector('[name="jenis_perjalanan"]').value =
                    option.dataset.jenis || '';

                document.querySelector('[name="tanggal_berangkat"]').value =
                    option.dataset.tanggal || '';

                document.querySelector('[name="package_kegiatan_id"]').value =
                    option.dataset.package || '';

                document.querySelector('[name="catatan"]').value =
                    option.dataset.catatan || '';
            });

        });
    </script>
@endsection
