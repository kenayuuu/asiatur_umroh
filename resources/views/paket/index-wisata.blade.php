@extends('layouts.app')

@section('title', 'Paket Wisata - ASIATUR')

@php
    use Illuminate\Support\Str;
@endphp

@section('content')
    <section class="min-h-screen bg-white text-black pt-24 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-12 text-center">
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-red-600 text-red-200 mb-4">
                    <span class="font-semibold">Paket Wisata</span>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold text-black tracking-tight">Jelajahi Paket Wisata ASIATUR</h1>
                <p class="mt-4 text-black max-w-2xl mx-auto">Temukan destinasi menarik, harga transparan, dan pengalaman
                    perjalanan yang lengkap bersama ASIATUR Tours & Travel.</p>
            </div>

            <div class="grid gap-8 lg:grid-cols-3">
                @forelse($packages as $package)
                    <article
                        class="group rounded-3xl border border-white/10 bg-white/5 p-6 shadow-xl shadow-red-900/10 transition hover:-translate-y-1 hover:border-red-500/40">
                        <div class="overflow-hidden rounded-3xl mb-5 bg-black">
                            <img src="{{ $package->image_url }}" alt="{{ $package->nama_paket }}"
                                class="w-full h-44 object-cover object-top transition duration-500 group-hover:scale-105">
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between gap-4">
                                <span
                                    class="inline-flex rounded-full bg-red-600 px-3 py-1 text-sm text-red-200 uppercase tracking-[0.3em]">Wisata</span>
                                <span class="text-sm text-gray">{{ $package->destinasi }}</span>
                            </div>
                            <h2 class="text-2xl font-semibold">{{ $package->nama_paket }}</h2>
                            <p class="text-gray line-clamp-3">
                                {{ $package->deskripsi ?? 'Nikmati pengalaman tur lengkap dengan layanan profesional dan itinerary jelas.' }}
                            </p>
                            <div class="space-y-3">
                                <div class="flex items-center justify-between text-white/80 text-sm">
                                    <span>Berangkat</span>
                                    <span>{{ $package->tanggal_berlangsung?->format('d M Y') ?? 'TBA' }}</span>
                                </div>
                                <div class="flex items-center justify-between text-white/80 text-sm">
                                    <span>Durasi</span>
                                    <span>{{ $package->durasi ?: 'Tidak tersedia' }}</span>
                                </div>
                            </div>
                            <div class="flex items-center justify-between pt-4 border-t border-white/10">
                                <div>
                                    <div class="text-sm text-gray-400">Harga mulai</div>
                                    <div class="text-2xl font-bold text-red-500">Rp
                                        {{ number_format($package->harga, 0, ',', '.') }}</div>
                                </div>
                                <a href="{{ route('package.show', $package) }}"
                                    class="inline-flex items-center gap-2 rounded-full border border-red-500/40 bg-red-600 px-5 py-3 text-sm font-semibold text-red-100 transition hover:bg-red-600 hover:text-white">Lihat
                                    Detail →</a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-3 rounded-3xl border border-black/10 bg-grey p-10 text-center text-white-300">
                        Belum ada paket wisata aktif saat ini. Silakan kembali nanti.
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
