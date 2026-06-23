@extends('layouts.app') @section('title', 'Profil & Kontak - ASIATUR') @section('content') <section
    class="min-h-screen bg-slate-950 text-slate-100 pt-28 pb-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-[2fr_1fr] items-start">
            <div class="space-y-8">
                <div class="glass-panel p-10"> <span
                        class="inline-flex items-center rounded-full bg-red-600/15 px-4 py-2 text-red-200 text-sm uppercase tracking-[0.3em]">Profil
                        ASIATUR</span>
                    <h1 class="mt-6 text-5xl font-semibold tracking-tight text-white">ASIATUR Tours & Travel</h1>
                    <p class="mt-4 text-slate-300 leading-relaxed">ASIATUR adalah perusahaan travel profesional yang
                        menyediakan paket perjalanan wisata, umroh, dan haji dengan pelayanan personal. Kami
                        mengedepankan kenyamanan, transparansi harga, dan pengalaman perjalanan yang aman untuk semua
                        tamu.</p>
                    <div class="grid gap-6 mt-10 sm:grid-cols-2">
                        <div class="rounded-[2rem] border border-white/10 bg-white/5 p-7">
                            <h2 class="text-xl font-semibold text-white mb-3">Visi</h2>
                            <ul class="list-disc list-inside space-y-3 text-slate-300">
                                <li>Menjadi perusahaan perjalanan wisata, umroh, haji yang customer oriented
                                    competitive, global, dan dinamis.</li>
                                <li>Manajemen yang sehat dan transparent secara finansial, berbasis IT serta menerapkan
                                    manajemen modern dan professional.</li>
                                <li>Memberikan kesejahteraan bagi semua elemen termasuk para karyawan para mitra, agen &
                                    perwakilan yang terlibat dalam perusahaan.</li>
                            </ul>
                        </div>
                        <div class="rounded-[2rem] border border-white/10 bg-white/5 p-7">
                            <h2 class="text-xl font-semibold text-white mb-3">Misi</h2>
                            <ul class="list-disc list-inside space-y-3 text-slate-300">
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
                    </div>
                </div>
                <div class="glass-panel p-10">
                    <h2 class="text-3xl font-semibold text-white mb-6">Kontak & Alamat</h2>
                    <div class="grid gap-5">
                        <div class="rounded-[2rem] border border-white/10 bg-slate-900/75 p-6">
                            <h3 class="text-lg font-semibold text-white mb-2">WhatsApp</h3>
                            <p class="text-slate-300">+62 811-6619-260</p>
                        </div>
                        <div class="rounded-[2rem] border border-white/10 bg-slate-900/75 p-6">
                            <h3 class="text-lg font-semibold text-white mb-2">Email</h3>
                            <p class="text-slate-300">asiatur.padang@yahoo.co.id</p>
                        </div>
                        <div class="rounded-[2rem] border border-white/10 bg-slate-900/75 p-6">
                            <h3 class="text-lg font-semibold text-white mb-2">Alamat</h3>
                            <p class="text-slate-300">Jl. Jaksa Agung Soeprapto No. 62, Kel. Flamboyan Baru, Kota
                                Padang, Sumatera Barat</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="glass-panel p-8">
                <h2 class="text-3xl font-semibold text-white mb-6">Maps</h2>
                <div class="aspect-[4/3] overflow-hidden rounded-[2rem] border border-white/10"> <iframe
                        class="w-full h-full"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3069.888068933022!2d100.34971527356204!3d-0.9269648353360328!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b90c605e09f3%3A0x2836121acc5a4606!2sAsiatur%20Tour%20%26%20Travel%20Padang!5e1!3m2!1sen!2sus!4v1779247329056!5m2!1sen!2sus"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe> </div>
            </div>
        </div>
    </div>
</section> @endsection
