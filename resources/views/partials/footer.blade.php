<footer class="bg-black text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        <div class="grid md:grid-cols-2 gap-12">
            <div class="space-y-6">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-red-600 rounded-xl flex items-center justify-center">
                        <span class="text-white font-bold">A</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold">ASIATUR Tours & Travel</h3>
                        <p class="text-sm text-gray-400">Travel yang menyediakan paket wisata, umroh, dan haji secara
                            profesional.</p>
                    </div>
                </div>
                <div class="space-y-3 text-sm text-gray-300">
                    <div class="flex items-start gap-3">
                        <span class="text-red-500 mt-1">📍</span>
                        <span>Jl. Jaksa Agung Soeprapto No. 62, Kel. Flamboyan Baru, Kota Padang, Sumatera Barat</span>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-red-500 mt-1">📞</span>
                        <span>+62 831-8234-8544</span>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-red-500 mt-1">✉️</span>
                        <span>asiatur.padang@yahoo.co.id</span>
                    </div>
                </div>
            </div>
            <div class="grid sm:grid-cols-2 gap-8">
                <div>
                    <h4 class="text-sm uppercase tracking-[0.3em] text-red-400 mb-4">Halaman</h4>
                    <ul class="space-y-3 text-gray-300 text-sm">
                        <li><a href="{{ route('landing') }}" class="hover:text-white">Beranda</a></li>
                        <li><a href="{{ route('paket.wisata') }}" class="hover:text-white">Paket Wisata</a></li>
                        <li><a href="{{ route('paket.umroh-haji') }}" class="hover:text-white">Paket Umroh & Haji</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-sm uppercase tracking-[0.3em] text-red-400 mb-4">Lainnya</h4>
                    <ul class="space-y-3 text-gray-300 text-sm">
                        <li><a href="{{ route('bisnis.lainnya') }}" class="hover:text-white">Bisnis Lainnya</a></li>
                        <li><a href="{{ route('profil.kontak') }}" class="hover:text-white">Profil & Kontak</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="mt-12 border-t border-white/10 pt-6 text-sm text-gray-500 text-center">
            © {{ date('Y') }} ASIATUR Tours & Travel. All rights reserved.
        </div>
    </div>
</footer>
