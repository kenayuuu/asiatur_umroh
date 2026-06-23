@extends('layouts.app')

@section('title', $package->nama_paket . ' - ASIATUR')

@section('content')
    <section class="min-h-screen bg-red-200 text-black pt-24 pb-24">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid gap-8 lg:grid-cols-[1.8fr_1.1fr] items-start">

                {{-- LEFT CONTENT --}}
                <div class="space-y-8">

                    {{-- Image --}}
                    <div class="flex justify-center">
                        <img src="{{ $package->image_url }}" alt="{{ $package->nama_paket }}"
                            class="w-full max-w-[400px] h-auto object-cover rounded-3xl shadow-lg">
                    </div>

                    {{-- Detail --}}
                    <div class="rounded-3xl border border-gray-200 bg-white p-8 shadow-lg">

                        <div class="flex flex-wrap gap-3 mb-6">

                            <span class="inline-flex items-center rounded-full bg-red-600 px-4 py-2 text-sm text-white">
                                {{ strtoupper($package->kategori) }}
                            </span>

                            <span class="inline-flex items-center rounded-full bg-gray-100 px-4 py-2 text-sm text-gray-700">
                                {{ $package->destinasi }}
                            </span>

                            <span class="inline-flex items-center rounded-full bg-gray-100 px-4 py-2 text-sm text-gray-700">
                                {{ $package->tanggal_berlangsung?->format('d M Y') ?? 'Tanggal TBA' }}
                            </span>

                        </div>

                        <h1 class="text-4xl font-bold mb-4">
                            {{ $package->nama_paket }}
                        </h1>

                        <p class="text-gray-600 leading-relaxed">
                            {{ $package->deskripsi ?? 'Paket perjalanan ibadah dengan fasilitas terbaik dan pelayanan profesional.' }}
                        </p>
                    </div>

                    {{-- Rundown --}}
                    <div class="rounded-3xl border border-gray-200 bg-white p-8 shadow-lg">
                        <h2 class="text-2xl font-semibold mb-4">
                            Rundown Kegiatan
                        </h2>

                        <p class="text-gray-600 leading-relaxed whitespace-pre-line">
                            {{ $package->rundown ?? 'Rundown akan diinformasikan sebelum keberangkatan.' }}
                        </p>
                    </div>

                </div>

                {{-- SIDEBAR --}}
                <aside class="space-y-6">

                    {{-- Price Card --}}
                    <div class="rounded-3xl border border-gray-200 bg-white p-8 shadow-lg">

                        <div class="flex items-center justify-between gap-4 mb-6">

                            <div>
                                <p class="text-sm text-gray-500 uppercase tracking-[0.2em]">
                                    Harga Mulai
                                </p>

                                <p class="text-3xl font-bold text-red-600">
                                    Rp {{ number_format($package->harga, 0, ',', '.') }}
                                </p>
                            </div>

                            <div class="text-right">
                                <p class="text-sm text-gray-500">
                                    Deposit
                                </p>

                                <p class="text-lg font-semibold">
                                    {{ $package->deposit ? 'Rp ' . number_format($package->deposit, 0, ',', '.') : 'Tidak wajib' }}
                                </p>
                            </div>
                        </div>

                        <div class="space-y-3 text-gray-600">

                            <div class="flex items-center justify-between">
                                <span>Durasi</span>
                                <span>{{ $package->durasi ?? 'TBA' }}</span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span>Destinasi</span>
                                <span>{{ $package->destinasi }}</span>
                            </div>

                        </div>
                    </div>

                    {{-- Booking --}}
                    <div class="rounded-3xl border border-gray-200 bg-white p-8 shadow-lg space-y-4">

                        <h3 class="text-xl font-semibold">
                            Langkah Pesan
                        </h3>

                        <ol class="list-decimal list-inside space-y-3 text-gray-600">
                            <li>Pilih paket dan lihat detail.</li>
                            <li>Hubungi admin melalui WhatsApp.</li>
                            <li>Konfirmasi data peserta.</li>
                            <li>Bayar deposit sesuai ketentuan.</li>
                        </ol>

                        <button id="openBookingModal"
                            class="block w-full text-center rounded-full bg-red-600 px-6 py-4 text-white font-semibold transition hover:bg-red-700 cursor-pointer">
                            Pesan Sekarang via WhatsApp
                        </button>

                    </div>

                </aside>
            </div>
        </div>
    </section>

    {{-- MODAL FORM --}}
    <div id="bookingModal"
        class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-end justify-center p-4 sm:items-center">
        <div class="bg-white rounded-3xl shadow-2xl max-w-3xl w-full max-h-[95vh] overflow-y-auto mt-20 sm:mt-0">
            {{-- Header --}}
            <div class="sticky top-0 bg-gradient-to-r from-red-600 to-red-700 flex items-center justify-between p-6 z-10">
                <div>
                    <h2 class="text-3xl font-bold text-white">📋 Formulir Pendaftaran</h2>
                    <p class="text-red-100 text-sm mt-1">Isi data diri Anda untuk proses pendaftaran</p>
                </div>
                <button id="closeBookingModal"
                    class="text-white hover:text-red-100 text-3xl leading-none p-2 hover:bg-red-500 rounded-full transition">
                    ✕
                </button>
            </div>

            <form id="bookingForm" method="POST" action="{{ route('package.booking') }}" class="p-8 space-y-8">
                @csrf
                <input type="hidden" name="package_id" value="{{ $package->id }}">

                {{-- Paket Info --}}
                <div class="bg-red-50 border-l-4 border-red-600 p-4 rounded-lg">
                    <p class="text-sm text-gray-600">📌 Paket Terpilih</p>
                    <p class="text-lg font-bold text-red-600">{{ $package->nama_paket }}</p>
                </div>

                {{-- Section 1: Data Pribadi --}}
                <div>
                    <h3 class="text-lg font-bold text-gray-800 mb-4 pb-2 border-b-2 border-red-600">👤 Data Pribadi</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        {{-- Nama Lengkap --}}
                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Nama Lengkap <span class="text-red-600">*</span>
                            </label>
                            <input type="text" name="nama_lengkap" required
                                class="w-full px-4 py-3 border text-black border-gray-300 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-transparent focus:shadow-lg transition"
                                placeholder="Masukkan nama lengkap Anda">
                        </div>

                        {{-- Email --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Email <span class="text-red-600">*</span>
                            </label>
                            <input type="email" name="email" required
                                class="w-full px-4 py-3 border text-black border-gray-300 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-transparent focus:shadow-lg transition"
                                placeholder="email@example.com">
                        </div>

                        {{-- Nomor WhatsApp --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Nomor WhatsApp <span class="text-red-600">*</span>
                            </label>
                            <input type="tel" name="no_telepon" required
                                class="w-full px-4 py-3 border text-black border-gray-300 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-transparent focus:shadow-lg transition"
                                placeholder="628xxxxxxxx">
                        </div>

                        {{-- Umur --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Umur <span class="text-red-600">*</span>
                            </label>
                            <input type="number" name="umur" required min="1" max="150"
                                class="w-full px-4 py-3 border text-black border-gray-300 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-transparent focus:shadow-lg transition"
                                placeholder="Tahun">
                        </div>

                        {{-- Alamat --}}
                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Alamat <span class="text-red-600">*</span>
                            </label>
                            <textarea name="alamat" rows="2" required
                                class="w-full px-4 py-3 border text-black border-gray-300 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-transparent focus:shadow-lg transition"
                                placeholder="Masukkan alamat lengkap Anda"></textarea>
                        </div>
                    </div>
                </div>

                {{-- Section 2: Dokumen Identitas --}}
                <div>
                    <h3 class="text-lg font-bold text-gray-800 mb-4 pb-2 border-b-2 border-red-600">🛂 Dokumen Identitas
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        {{-- Nomor KTP --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Nomor KTP
                            </label>
                            <input type="text" name="no_ktp"
                                class="w-full px-4 py-3 border text-black border-gray-300 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-transparent focus:shadow-lg transition"
                                placeholder="Opsional">
                        </div>

                        {{-- Nomor KK --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Nomor Kartu Keluarga
                            </label>
                            <input type="text" name="no_kk"
                                class="w-full px-4 py-3 border text-black border-gray-300 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-transparent focus:shadow-lg transition"
                                placeholder="Opsional">
                        </div>

                        {{-- Nomor Paspor --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Nomor Paspor
                            </label>
                            <input type="text" name="no_paspor"
                                class="w-full px-4 py-3 border text-black border-gray-300 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-transparent focus:shadow-lg transition"
                                placeholder="Opsional">
                        </div>

                        {{-- Akta Kelahiran --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Nomor Akta Kelahiran
                            </label>
                            <input type="text" name="akta_kelahiran"
                                class="w-full px-4 py-3 border text-black border-gray-300 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-transparent focus:shadow-lg transition"
                                placeholder="Opsional">
                        </div>
                    </div>
                </div>

                {{-- Section 3: Catatan Tambahan --}}
                <div>
                    <h3 class="text-lg font-bold text-gray-800 mb-4 pb-2 border-b-2 border-red-600">📝 Catatan Tambahan
                    </h3>
                    <textarea name="catatan" rows="4"
                        class="w-full px-4 py-3 border text-black border-gray-300 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-transparent focus:shadow-lg transition"
                        placeholder="Masukkan pertanyaan atau informasi tambahan (opsional)"></textarea>
                </div>

                {{-- Buttons --}}
                <div class="flex gap-3 pt-6 border-t border-gray-200">
                    <button type="button" id="cancelBookingBtn"
                        class="flex-1 px-6 py-3 border-2 border-gray-300 rounded-lg text-gray-700 font-bold hover:bg-gray-100 transition duration-200">
                        Batal
                    </button>
                    <button type="submit"
                        class="flex-1 px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 rounded-lg text-white font-bold hover:shadow-lg transition duration-200 flex items-center justify-center gap-2">
                        <span>✓</span> Kirim ke WhatsApp
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const bookingModal = document.getElementById('bookingModal');
            const openBookingModal = document.getElementById('openBookingModal');
            const closeBookingModal = document.getElementById('closeBookingModal');
            const cancelBookingBtn = document.getElementById('cancelBookingBtn');
            const bookingForm = document.getElementById('bookingForm');

            // Buka Modal
            openBookingModal.addEventListener('click', function() {
                bookingModal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            });

            // Tutup Modal
            const closeModal = () => {
                bookingModal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            };

            closeBookingModal.addEventListener('click', closeModal);
            cancelBookingBtn.addEventListener('click', closeModal);

            // Tutup modal jika klik di luar area form
            bookingModal.addEventListener('click', function(e) {
                if (e.target === bookingModal) {
                    closeModal();
                }
            });

            // Handle form submission
            bookingForm.addEventListener('submit', function(e) {
                // Form akan di-submit ke server, biarkan action form handle redirect ke WhatsApp
            });
        });
    </script>
@endsection
