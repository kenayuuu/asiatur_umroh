@extends('layouts.app') @section('title', 'Home - ASIATUR') @section('content') <section
    class="relative overflow-hidden bg-slate-950 text-white pt-24 pb-20">
    <div
        class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,rgba(248,113,113,0.18),transparent_32%),radial-gradient(circle_at_bottom_right,rgba(248,113,113,0.12),transparent_28%)]">
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid gap-14 lg:grid-cols-2 items-center">
            <div class="space-y-8"> <span
                    class="inline-flex items-center rounded-full bg-white/10 px-4 py-2 text-sm uppercase tracking-[0.3em] text-red-300">ASIATUR
                    Tours & Travel</span>
                <h1 class="text-4xl sm:text-5xl font-semibold tracking-tight text-white">Perjalanan Wisata, Umroh, dan
                    Haji dalam Satu Tujuan</h1>
                <p class="text-slate-300 text-lg md:text-xl max-w-2xl leading-relaxed">ASIATUR menghadirkan paket
                    perjalanan lengkap dengan dukungan tim profesional, harga transparan, dan layanan personal untuk
                    wisata, umroh, dan haji. Nikmati pengalaman perjalanan yang aman dan nyaman bersama kami.</p>
                <div class="flex flex-wrap gap-4"> <a href="{{ route('paket.wisata') }}"
                        class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-red-500 to-rose-500 px-6 py-3 text-white font-semibold shadow-2xl shadow-red-500/25 hover:opacity-95 transition">Paket
                        Wisata</a> <a href="{{ route('paket.umroh-haji') }}"
                        class="inline-flex items-center justify-center rounded-full border border-white/10 bg-white/10 px-6 py-3 text-white font-semibold hover:bg-white/20 transition">Paket
                        Umroh & Haji</a> </div>
            </div>
            <div
                class="relative overflow-hidden rounded-[2.5rem] border border-white/10 bg-white/5 p-4 shadow-2xl shadow-black/30 backdrop-blur-xl">
                <div
                    class="h-[28rem] rounded-[2rem] bg-gradient-to-br from-slate-900 via-slate-800 to-red-900 p-8 text-white flex flex-col justify-between">
                    <div class="space-y-4"> <span
                            class="inline-flex rounded-full bg-red-500/20 px-4 py-1 text-sm uppercase tracking-[0.3em] text-red-200">Travel
                            Service</span>
                        <h2 class="text-3xl font-semibold">Rencana Perjalanan Terpercaya</h2>
                        <p class="text-slate-300 leading-relaxed">Jelajahi destinasi eksotis, nikmati perjalanan ibadah,
                            dan rencanakan agenda bisnis dengan dukungan tim yang berpengalaman.</p>
                    </div>
                    <div class="grid gap-4 sm:grid-cols-2 text-sm text-slate-200">
                        <div class="rounded-3xl bg-white/5 p-5">
                            <p class="font-semibold">Paket Wisata</p>
                            <p class="text-slate-400">Destinasi lokal dan internasional.</p>
                        </div>
                        <div class="rounded-3xl bg-white/5 p-5">
                            <p class="font-semibold">Umroh & Haji</p>
                            <p class="text-slate-400">Layanan perjalanan ibadah premium.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-slate-50 text-slate-900 py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14"> <span
                class="inline-flex rounded-full bg-red-100 px-4 py-1 text-sm font-semibold uppercase tracking-[0.3em] text-red-600">Tentang
                ASIATUR</span>
            <h2 class="mt-4 text-4xl font-bold tracking-tight">Solusi perjalanan wisata dan ibadah terbaik untuk
                keluarga Indonesia</h2>
            <p class="mx-auto mt-4 max-w-2xl text-slate-600">Kami menyatukan paket wisata, umroh, dan haji dalam layanan
                end-to-end yang mudah dipesan, transparan harganya, dan didukung oleh tim layanan penuh perhatian.</p>
        </div>
        <div class="grid gap-8 lg:grid-cols-3">
            <div class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-xl shadow-slate-200/20">
                <h3 class="text-xl font-semibold mb-4">Visi</h3>
                <ul class="space-y-3 text-slate-600 list-disc list-inside">
                    <li>Menjadi perusahaan perjalanan wisata, umroh, haji yang customer oriented
                        competitive, global, dan dinamis.</li>
                    <li>Manajemen yang sehat dan transparent secara finansial, berbasis IT serta menerapkan
                        manajemen modern dan professional.</li>
                    <li>Memberikan kesejahteraan bagi semua elemen termasuk para karyawan para mitra, agen &
                        perwakilan yang terlibat dalam perusahaan.</li>
                </ul>
            </div>
            <div class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-xl shadow-slate-200/20">
                <h3 class="text-xl font-semibold mb-4">Misi</h3>
                <ul class="space-y-3 text-slate-600 list-disc list-inside">
                    <li>Menyediakan dan menyelenggarakan ibadah umroh dan haji yang amanah berkualitas dan
                        professional.</li>
                    <li>Menyediakan perjalanan umroh dan haji yang nyaman, menyenangkan serta perjalanan
                        wisata yang berkesan.</li>
                    <li>Mengembangkan dan menunjukkan objek pariwisata di Indonesia serta memberi manfaat
                        positif bagi masyarakat sekitar daerah objek wisata.</li>
                    <li>Membantu meningkatkan kualitas standar pariwisata dalam negeri khususnya ibadah
                        Umroh dan Haji agar dapat bersaing di dunia Internasional.</li>
                </ul>
            </div>
            <div class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-xl shadow-slate-200/20">
                <h3 class="text-xl font-semibold mb-4">Profil Singkat</h3>
                <p class="text-slate-600">ASIATUR berlokasi di Padang, Sumatera Barat, melayani perjalanan wisata, paket
                    umroh, dan haji dengan komitmen layanan yang responsif dan profesional.</p>
            </div>
        </div>
    </div>
</section>
<section class="bg-slate-950 text-white py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid gap-8 lg:grid-cols-3">
            <div
                class="rounded-[2rem] border border-white/10 bg-white/5 p-8 shadow-2xl shadow-black/30 backdrop-blur-xl">
                <h3 class="text-2xl font-semibold mb-4">Paket Wisata</h3>
                <p class="text-slate-300 mb-6">Kunjungi destinasi populer dalam paket wisata kami yang lengkap dengan
                    itinerari, akomodasi, dan dukungan perjalanan.</p> <a href="{{ route('paket.wisata') }}"
                    class="inline-flex items-center gap-2 rounded-full bg-red-500 px-5 py-3 text-white font-semibold hover:bg-red-600 transition">Lihat
                    Paket Wisata</a>
            </div>
            <div
                class="rounded-[2rem] border border-white/10 bg-white/5 p-8 shadow-2xl shadow-black/30 backdrop-blur-xl">
                <h3 class="text-2xl font-semibold mb-4">Paket Umroh & Haji</h3>
                <p class="text-slate-300 mb-6">Nikmati perjalanan ibadah yang tenang dengan paket umroh dan haji yang
                    dirancang untuk kenyamanan dan ketenangan spiritual.</p> <a href="{{ route('paket.umroh-haji') }}"
                    class="inline-flex items-center gap-2 rounded-full bg-white text-slate-950 px-5 py-3 font-semibold hover:bg-slate-100 transition">Lihat
                    Paket Umroh & Haji</a>
            </div>
            <div
                class="rounded-[2rem] border border-white/10 bg-white/5 p-8 shadow-2xl shadow-black/30 backdrop-blur-xl">
                <h3 class="text-2xl font-semibold mb-4">Bisnis Lainnya</h3>
                <p class="text-slate-300 mb-6">Kami juga mendukung unit bisnis lain seperti parcel, produk pertanian,
                    dan layanan logistik untuk ekosistem usaha yang saling menguatkan.</p> <a
                    href="{{ route('bisnis.lainnya') }}"
                    class="inline-flex items-center gap-2 rounded-full border border-red-500 px-5 py-3 text-red-100 hover:bg-red-500/10 transition">Lihat
                    Bisnis</a>
            </div>
        </div>
    </div>
</section>
<section class="bg-slate-50 text-slate-900 py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12"> <span
                class="inline-flex rounded-full bg-red-100 px-4 py-1 text-sm uppercase tracking-[0.3em] text-red-600">Kontak</span>
            <h2 class="mt-4 text-4xl font-bold tracking-tight">Siap membantu setiap langkah perjalanan Anda</h2>
        </div>
        <div class="grid gap-8 lg:grid-cols-3">
            <div class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-xl shadow-slate-200/20">
                <p class="text-sm uppercase tracking-[0.25em] text-red-600 mb-4">WhatsApp</p>
                <p class="text-2xl font-semibold text-slate-900">+62 811 6619 260</p>
            </div>
            <div class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-xl shadow-slate-200/20">
                <p class="text-sm uppercase tracking-[0.25em] text-red-600 mb-4">Email</p>
                <p class="text-2xl font-semibold text-slate-900">asiatur.padang@yahoo.co.id</p>
            </div>
            <div class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-xl shadow-slate-200/20">
                <p class="text-sm uppercase tracking-[0.25em] text-red-600 mb-4">Alamat</p>
                <p class="text-2xl font-semibold text-slate-900">Padang, Sumatera Barat</p>
            </div>
        </div>
    </div>
</section> @endsection
