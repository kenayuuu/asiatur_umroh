@extends('layouts.app')

@section('title', $package->nama_paket . ' - ASIATUR')

@section('content')
    <section class="min-h-screen bg-red-600/20 text-black pt-24 pb-24">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid gap-10 lg:grid-cols-[2fr_1fr] items-start">

                {{-- LEFT CONTENT --}}
                <div class="space-y-8">

                    {{-- Image --}}
                    {{-- @php
                        if (!empty($package->image_url)) {
                            $imagePath = $package->image_url;
                        } elseif (!empty($package->image)) {
                            $imagePath = asset('images/' . $package->image);
                        } else {
                            $imagePath = asset('images/default.jpg');
                        }
                    @endphp --}}

                    <div class="rounded-3xl overflow-hidden bg-white shadow-xl border border-gray-200">
                        <img src="{{ $package->image }}" alt="{{ $package->nama_paket }}"
                            class="w-full h-96 object-cover object-center">
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

                        <a href="https://wa.me/6283182348544?text=Halo%20ASIATUR%2C%20saya%20ingin%20membooking%20paket%20{{ urlencode($package->nama_paket) }}"
                            target="_blank"
                            class="block text-center rounded-full bg-red-600 px-6 py-4 text-white font-semibold transition hover:bg-red-700">
                            Pesan Sekarang via WhatsApp
                        </a>

                    </div>

                </aside>
            </div>
        </div>
    </section>
@endsection
