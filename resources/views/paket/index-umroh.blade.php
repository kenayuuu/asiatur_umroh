@extends('layouts.app')

@section('title', 'Paket Umroh & Haji - ASIATUR')

@section('content')
    <section class="min-h-screen bg-white text-black pt-24 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Heading --}}
            <div class="mb-12 text-center">
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-red-600 text-red-100 mb-4">
                    <span class="font-semibold">Umroh & Haji</span>
                </div>

                <h1 class="text-4xl md:text-5xl font-bold tracking-tight">
                    Paket Umroh & Haji Terbaik
                </h1>

                <p class="mt-4 text-black max-w-2xl mx-auto">
                    Rencanakan perjalanan ibadah dengan fasilitas terbaik,
                    harga transparan, dan pelayanan profesional dari ASIATUR.
                </p>
            </div>

            {{-- Grid --}}
            <div class="grid gap-8 lg:grid-cols-3">
                @forelse($packages as $package)
                    <article
                        class="group rounded-3xl border border-gray-200 bg-white p-6 shadow-lg transition duration-300 hover:-translate-y-1 hover:shadow-2xl">

                        {{-- Image --}}
                        <div class="overflow-hidden rounded-3xl mb-5 bg-black">
                            <img src="{{ $package->image_url }}" alt="{{ $package->nama_paket }}"
                                class="w-full h-44 object-cover object-top transition duration-500 group-hover:scale-105">
                        </div>

                        {{-- Content --}}
                        <div class="space-y-4">

                            <div class="flex items-center justify-between gap-4">
                                <span
                                    class="inline-flex rounded-full bg-red-600 px-3 py-1 text-sm text-red-100 uppercase tracking-[0.3em]">
                                    {{ strtoupper($package->kategori) }}
                                </span>

                                <span class="text-sm text-gray-500">
                                    {{ $package->destinasi }}
                                </span>
                            </div>

                            <h2 class="text-2xl font-semibold text-black">
                                {{ $package->nama_paket }}
                            </h2>

                            <p class="text-gray-600 line-clamp-3">
                                {{ $package->deskripsi ?? 'Paket ibadah lengkap dengan fasilitas terbaik dan pendamping profesional.' }}
                            </p>

                            {{-- Info --}}
                            <div class="space-y-3">
                                <div class="flex items-center justify-between text-sm text-gray-600">
                                    <span>Berangkat</span>
                                    <span>
                                        {{ $package->tanggal_berlangsung?->format('d M Y') ?? 'TBA' }}
                                    </span>
                                </div>

                                <div class="flex items-center justify-between text-sm text-gray-600">
                                    <span>Durasi</span>
                                    <span>
                                        {{ $package->durasi ?: 'Tidak tersedia' }}
                                    </span>
                                </div>
                            </div>

                            {{-- Footer --}}
                            <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                                <div>
                                    <div class="text-sm text-gray-500">
                                        Harga mulai
                                    </div>

                                    <div class="text-2xl font-bold text-red-600">
                                        Rp {{ number_format($package->harga, 0, ',', '.') }}
                                    </div>
                                </div>

                                <a href="{{ route('package.show', $package) }}"
                                    class="inline-flex items-center gap-2 rounded-full bg-red-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-red-700">
                                    Lihat Detail →
                                </a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-3 rounded-3xl border border-gray-200 bg-gray-50 p-10 text-center text-gray-600">
                        Belum ada paket umroh/haji aktif saat ini.
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
