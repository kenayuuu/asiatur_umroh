<footer class="bg-slate-950 text-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 border-t border-white/10">
        <div class="grid md:grid-cols-2 gap-12">
            <div class="space-y-6">
                <div class="flex items-center space-x-3">
                    <div
                        class="w-14 h-14 bg-gradient-to-br from-red-500 to-orange-500 rounded-3xl flex items-center justify-center shadow-lg shadow-red-500/20">
                        <span class="text-white font-bold">A</span>
                    </div>
                    <div>
                        <h3 class="text-2xl font-semibold text-white">ASIATUR Tours & Travel</h3>
                        <p class="text-sm text-slate-400">Travel yang menyediakan paket wisata, umroh, dan haji secara
                            profesional.</p>
                    </div>
                </div>
                <div class="space-y-3 text-sm text-slate-300">
                    <div class="flex items-start gap-3">
                        <span class="text-red-400 mt-1">📍</span>
                        <span>Jl. Jaksa Agung Soeprapto No. 62, Kel. Flamboyan Baru, Kota Padang, Sumatera Barat</span>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-red-400 mt-1">📞</span>
                        <span>+62 811-6619-260</span>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-red-400 mt-1">✉️</span>
                        <span>asiatur.padang@yahoo.co.id</span>
                    </div>
                </div>
            </div>
            <div class="grid sm:grid-cols-2 gap-8">
                <div>
                    <h4 class="text-sm uppercase tracking-[0.3em] text-red-400 mb-4">Halaman</h4>
                    <ul class="space-y-3 text-slate-300 text-sm">
                        <li><a href="{{ route('landing') }}" class="hover:text-white">Beranda</a></li>
                        <li><a href="{{ route('paket.wisata') }}" class="hover:text-white">Paket Wisata</a></li>
                        <li><a href="{{ route('paket.umroh-haji') }}" class="hover:text-white">Paket Umroh & Haji</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-sm uppercase tracking-[0.3em] text-red-400 mb-4">Lainnya</h4>
                    <ul class="space-y-3 text-slate-300 text-sm">
                        <li><a href="{{ route('bisnis.lainnya') }}" class="hover:text-white">Bisnis Lainnya</a></li>
                        <li><a href="{{ route('profil.kontak') }}" class="hover:text-white">Profil & Kontak</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="mt-12 border-t border-white/10 pt-6 text-sm text-slate-500 text-center">
            © {{ date('Y') }} ASIATUR Tours & Travel. All rights reserved.
        </div>
    </div>
</footer>
