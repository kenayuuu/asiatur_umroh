@extends('layouts.app')

@section('title', 'Profil & Kontak - ASIATUR')

@section('content')
    <section class="min-h-screen bg-black text-white pt-24 pb-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[2fr_1fr] items-start">
                <div class="space-y-8">
                    <div class="rounded-3xl border border-white/10 bg-white/5 p-8 shadow-xl">
                        <div class="inline-flex items-center rounded-full bg-red-600/15 px-4 py-2 text-red-200 mb-4">Profil
                            ASIATUR</div>
                        <h1 class="text-4xl font-bold text-white mb-4">ASIATUR Tours & Travel</h1>
                        <p class="text-gray-300 leading-relaxed">ASIATUR adalah perusahaan travel profesional yang
                            menyediakan paket perjalanan wisata, umroh, dan haji dengan pelayanan personal. Kami
                            mengedepankan kenyamanan, transparansi harga, dan pengalaman perjalanan yang aman untuk semua
                            tamu.</p>
                        <div class="grid gap-6 mt-10 sm:grid-cols-2">
                            <div class="rounded-3xl bg-white/5 border border-white/10 p-6">
                                <h2 class="text-xl font-semibold text-white mb-3">Visi</h2>
                                <p class="text-gray-300">Menjadi travel terpercaya yang memudahkan masyarakat Indonesia
                                    dalam menikmati wisata serta ibadah dengan layanan profesional dan aman.</p>
                            </div>
                            <div class="rounded-3xl bg-white/5 border border-white/10 p-6">
                                <h2 class="text-xl font-semibold text-white mb-3">Misi</h2>
                                <ul class="list-disc list-inside space-y-2 text-gray-300">
                                    <li>Menyediakan paket perjalanan lengkap dan transparan.</li>
                                    <li>Memberi layanan konsultasi dan pendampingan selama perjalanan.</li>
                                    <li>Mengutamakan kenyamanan dan keamanan setiap pelanggan.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-3xl border border-white/10 bg-white/5 p-8 shadow-xl">
                        <h2 class="text-3xl font-semibold text-white mb-4">Kontak & Alamat</h2>
                        <div class="grid gap-5">
                            <div class="rounded-3xl bg-black/40 border border-white/10 p-6">
                                <h3 class="text-lg font-semibold text-white mb-2">WhatsApp</h3>
                                <p class="text-gray-300">+62 831-8234-8544</p>
                            </div>
                            <div class="rounded-3xl bg-black/40 border border-white/10 p-6">
                                <h3 class="text-lg font-semibold text-white mb-2">Email</h3>
                                <p class="text-gray-300">asiatur.padang@yahoo.co.id</p>
                            </div>
                            <div class="rounded-3xl bg-black/40 border border-white/10 p-6">
                                <h3 class="text-lg font-semibold text-white mb-2">Alamat</h3>
                                <p class="text-gray-300">Jl. Jaksa Agung Soeprapto No. 62, Kel. Flamboyan Baru, Kota Padang,
                                    Sumatera Barat</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rounded-3xl border border-white/10 bg-white/5 p-8 shadow-xl">
                    <h2 class="text-3xl font-semibold text-white mb-6">Maps</h2>
                    <div class="aspect-[4/3] overflow-hidden rounded-3xl border border-white/10">
                        <iframe class="w-full h-full"
                            src="https://maps.google.com/maps?q=Jl.+Jaksa+Agung+Soeprapto+No.+62+Kel.+Flamboyan+Baru+Kota+Padang+Sumatera+Barat&output=embed"
                            style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
