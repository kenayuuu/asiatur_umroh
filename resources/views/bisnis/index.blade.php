@extends('layouts.app')

@section('title', 'Bisnis Lainnya - ASIATUR')

@section('content')
    <section class="min-h-screen bg-white text-black pt-24 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-12 text-center">
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-red-600 text-red-200 mb-4">
                    <span class="font-semibold">Bisnis Lainnya</span>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold text-black tracking-tight">Ekosistem Bisnis ASIATUR</h1>
                <p class="mt-4 text-gray max-w-2xl mx-auto">Mengenal berbagai unit bisnis yang didukung ASIATUR, dari
                    layanan parcel sampai produk ternak unggulan.</p>
            </div>

            <div class="grid gap-8 lg:grid-cols-3">
                @forelse($businesses as $business)
                    <article
                        class="rounded-3xl border border-white/10 bg-white/5 p-6 shadow-xl shadow-red-900/10 transition hover:-translate-y-1 hover:border-red-500/40">
                        <div class="rounded-3xl overflow-hidden bg-gray-100 mb-5">
                            <img src="{{ $business->image_url }}" alt="{{ $business->judul }}"
                                class="h-52 w-full object-cover" />
                        </div>
                        <div class="space-y-4">
                            <h2 class="text-2xl font-semibold text-black">{{ $business->judul }}</h2>
                            <p class="text-gray-600 leading-relaxed">{{ $business->deskripsi }}</p>
                        </div>
                    </article>
                @empty
                    <div class="col-span-3 rounded-3xl border border-white/10 bg-white/5 p-10 text-center text-gray-300">
                        Saat ini belum ada bisnis tambahan aktif.
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
