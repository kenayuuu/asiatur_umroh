@extends('layouts.app')

@section('title', 'Home - ASIATUR')

@section('content')
    <section class="bg-[#C60C00] text-white pt-24 pb-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-2 items-center">
                <div class="space-y-8">
                    <div
                        class="inline-flex items-center rounded-full bg-black px-4 py-2 text-sm uppercase tracking-[0.3em] text-white">
                        ASIATUR Tours & Travel</div>
                    <h1 class="text-4xl sm:text-5xl font-bold tracking-tight text-white">Perjalanan Wisata, Umroh, dan Haji
                        dalam Satu Tujuan</h1>
                    <p class="text-white text-lg md:text-xl max-w-2xl">ASIATUR menghadirkan paket perjalanan lengkap
                        dengan dukungan tim profesional, harga transparan, dan layanan personal untuk wisata, umroh, dan
                        haji. Nikmati pengalaman perjalanan yang aman dan nyaman bersama kami.</p>
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('paket.wisata') }}"
                            class="inline-flex items-center justify-center rounded-full bg-black px-6 py-3 text-white font-semibold shadow-lg shadow-red-500/30 hover:bg-red-700 transition">Paket
                            Wisata</a>
                        <a href="{{ route('paket.umroh-haji') }}"
                            class="inline-flex items-center justify-center rounded-full border border-white/10 bg-white px-6 py-3 text-black font-semibold hover:bg-white/10 transition">Paket
                            Umroh & Haji</a>
                    </div>
                </div>
                <div
                    class="relative overflow-hidden rounded-[2.5rem] border border-red-500/10 bg-gradient-to-br from-slate-900 via-black to-slate-900 p-4 shadow-2xl shadow-red-900/10">
                    <div class="flex h-96 flex-col justify-between rounded-3xl bg-white/5 p-8 text-white">
                        <div class="space-y-4">
                            <span
                                class="inline-flex rounded-full bg-red-600/20 px-3 py-1 text-sm uppercase tracking-[0.3em] text-red-200">Travel
                                Service</span>
                            <h2 class="text-3xl font-semibold">Rencana Perjalanan Terpercaya</h2>
                            <p class="text-gray-300 leading-relaxed">Jelajahi destinasi eksotis, nikmati perjalanan ibadah,
                                dan rencanakan acara bisnis dengan layanan perjalanan yang berpengalaman.</p>
                        </div>
                        <div class="grid gap-4 sm:grid-cols-2 text-sm text-gray-300">
                            <div class="rounded-3xl bg-white/5 p-4">
                                <p class="font-semibold">Paket Wisata</p>
                                <p class="text-gray-400">Destinasi lokal dan internasional.</p>
                            </div>
                            <div class="rounded-3xl bg-white/5 p-4">
                                <p class="font-semibold">Umroh & Haji</p>
                                <p class="text-gray-400">Layanan perjalanan ibadah premium.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white text-slate-900 py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <span
                    class="inline-flex rounded-full bg-red-100 px-4 py-1 text-sm font-semibold uppercase tracking-[0.3em] text-red-600">Tentang
                    ASIATUR</span>
                <h2 class="mt-4 text-4xl font-bold tracking-tight">Solusi perjalanan wisata dan ibadah terbaik untuk
                    keluarga Indonesia</h2>
                <p class="mx-auto mt-4 max-w-2xl text-gray-600">Kami menyatukan paket wisata, umroh, dan haji dalam layanan
                    end-to-end yang mudah dipesan, transparan harganya, dan didukung oleh tim layanan penuh perhatian.</p>
            </div>

            <div class="grid gap-8 lg:grid-cols-3">
                <div class="rounded-3xl border border-slate-200 p-8 shadow-lg shadow-slate-200/10">
                    <h3 class="text-xl font-semibold mb-4">Visi</h3>
                    <p class="text-gray-600">Menjadi travel terpercaya yang memudahkan setiap perjalanan wisata dan ibadah
                        dengan layanan modern, aman, dan penuh nilai.</p>
                </div>
                <div class="rounded-3xl border border-slate-200 p-8 shadow-lg shadow-slate-200/10">
                    <h3 class="text-xl font-semibold mb-4">Misi</h3>
                    <ul class="space-y-3 text-gray-600 list-disc list-inside">
                        <li>Menyediakan paket yang jelas dan transparan.</li>
                        <li>Mendukung perjalanan dengan tim profesional.</li>
                        <li>Mengutamakan kenyamanan dan keamanan setiap tamu.</li>
                    </ul>
                </div>
                <div class="rounded-3xl border border-slate-200 p-8 shadow-lg shadow-slate-200/10">
                    <h3 class="text-xl font-semibold mb-4">Profil Singkat</h3>
                    <p class="text-gray-600">ASIATUR berlokasi di Padang, Sumatera Barat, melayani perjalanan wisata, paket
                        umroh, dan haji dengan komitmen layanan yang responsif dan profesional.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-black text-white py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid gap-8 lg:grid-cols-3">
                <div class="rounded-3xl border border-white/10 bg-white/5 p-8 shadow-2xl shadow-red-900/10">
                    <h3 class="text-2xl font-semibold mb-4">Paket Wisata</h3>
                    <p class="text-gray-300 mb-6">Kunjungi destinasi populer dalam paket wisata kami yang lengkap dengan
                        itinerari, akomodasi, dan dukungan perjalanan.</p>
                    <a href="{{ route('paket.wisata') }}"
                        class="inline-flex items-center gap-2 rounded-full bg-red-600 px-5 py-3 text-white font-semibold hover:bg-red-700 transition">Lihat
                        Paket Wisata</a>
                </div>
                <div class="rounded-3xl border border-white/10 bg-white/5 p-8 shadow-2xl shadow-red-900/10">
                    <h3 class="text-2xl font-semibold mb-4">Paket Umroh & Haji</h3>
                    <p class="text-gray-300 mb-6">Nikmati perjalanan ibadah yang tenang dengan paket umroh dan haji yang
                        dirancang untuk kenyamanan dan ketenangan spiritual.</p>
                    <a href="{{ route('paket.umroh-haji') }}"
                        class="inline-flex items-center gap-2 rounded-full bg-white text-black px-5 py-3 font-semibold hover:bg-slate-100 transition">Lihat
                        Paket Umroh & Haji</a>
                </div>
                <div class="rounded-3xl border border-white/10 bg-white/5 p-8 shadow-2xl shadow-red-900/10">
                    <h3 class="text-2xl font-semibold mb-4">Bisnis Lainnya</h3>
                    <p class="text-gray-300 mb-6">Kami juga mendukung unit bisnis lain seperti parcel, produk pertanian, dan
                        layanan logistik untuk ekosistem usaha yang saling menguatkan.</p>
                    <a href="{{ route('bisnis.lainnya') }}"
                        class="inline-flex items-center gap-2 rounded-full border border-red-500 px-5 py-3 text-red-100 hover:bg-red-500/10 transition">Lihat
                        Bisnis</a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span
                    class="inline-flex rounded-full bg-red-100 px-4 py-1 text-sm uppercase tracking-[0.3em] text-red-600">Kontak</span>
                <h2 class="mt-4 text-4xl font-bold tracking-tight text-slate-900">Siap membantu setiap langkah perjalanan
                    Anda</h2>
            </div>
            <div class="grid gap-8 lg:grid-cols-3">
                <div class="rounded-3xl border border-slate-200 p-8 shadow-lg shadow-slate-200/10 bg-slate-50">
                    <p class="text-sm uppercase tracking-[0.25em] text-red-600 mb-4">WhatsApp</p>
                    <p class="text-2xl font-semibold text-slate-900">+62 831 8234 8544</p>
                </div>
                <div class="rounded-3xl border border-slate-200 p-8 shadow-lg shadow-slate-200/10 bg-slate-50">
                    <p class="text-sm uppercase tracking-[0.25em] text-red-600 mb-4">Email</p>
                    <p class="text-2xl font-semibold text-slate-900">asiatur.padang@yahoo.co.id</p>
                </div>
                <div class="rounded-3xl border border-slate-200 p-8 shadow-lg shadow-slate-200/10 bg-slate-50">
                    <p class="text-sm uppercase tracking-[0.25em] text-red-600 mb-4">Alamat</p>
                    <p class="text-2xl font-semibold text-slate-900">Padang, Sumatera Barat</p>
                </div>
            </div>
        </div>
    </section>
@endsection
