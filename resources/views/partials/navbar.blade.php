@php
    $navItems = [
        ['name' => 'Beranda', 'href' => route('landing')],
        ['name' => 'Paket Wisata', 'href' => route('paket.wisata')],
        ['name' => 'Paket Umroh & Haji', 'href' => route('paket.umroh-haji')],
        ['name' => 'Bisnis Lainnya', 'href' => route('bisnis.lainnya')],
        ['name' => 'Profil & Kontak', 'href' => route('profil.kontak')],
    ];
@endphp

<nav id="navbar" class="fixed top-0 left-0 w-full z-[9999] bg-white border-b border-gray-200">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 lg:h-20">

            {{-- Logo --}}
            <div class="flex-shrink-0">
                <a href="{{ route('landing') }}" class="flex items-center space-x-3">
                    <img src="{{ asset('images/asiatur2.png') }}" class="h-10 lg:h-12 w-auto" alt="Logo ASIATUR">

                    <span class="text-red-600 text-xl font-bold hidden sm:inline-block">
                        {{ __('app.name') ?? 'ASIATUR' }}
                    </span>
                </a>
            </div>

            {{-- NAVIGASI DESKTOP --}}
            <div class="hidden lg:flex items-center">
                <div class="flex items-center space-x-2">

                    @foreach ($navItems as $item)
                        <a href="{{ $item['href'] }}"
                            class="px-4 py-2 rounded-xl
                            text-black font-medium
                            transition-all duration-300
                            hover:bg-red-600
                            hover:text-white">
                            {{ $item['name'] }}
                        </a>
                    @endforeach

                </div>

                {{-- PEMISAH --}}
                <div class="w-px h-6 bg-gray-200 mx-4"></div>

                {{-- TOMBOL AUTH DESKTOP --}}
                <div class="flex items-center">
                    @guest
                        {{-- PERBAIKAN: Tombol Login (Secondary) disamakan dengan mobile --}}
                        <a href="{{ route('login.form') }}"
                            class="px-4 py-2 rounded-md font-semibold text-red-600
                                       border border-red-500
                                       hover:bg-red-50 hover:text-red-700
                                       transition duration-300 ease-in-out">
                            Login
                        </a>
                    @else
                        {{-- PERBAIKAN: Tombol Logout diganti User Menu Dropdown --}}
                        <div class="relative ml-3">
                            <div>
                                <button type="button"
                                    class="flex text-sm bg-gray-100 rounded-full hover:ring-2 hover:ring-red-400 focus:outline-none focus:ring-2 focus:ring-red-500"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Buka menu pengguna</span>
                                    {{-- Ganti <img> dengan avatar user jika ada --}}
                                    <span
                                        class="h-10 w-10 flex items-center justify-center rounded-full bg-red-100 text-red-600 font-semibold">
                                        {{-- Mengambil 2 huruf pertama dari nama --}}
                                        {{ substr(Auth::user()->name, 0, 2) }}
                                    </span>
                                </button>
                            </div>

                            {{-- Dropdown Menu --}}
                            <div id="user-menu"
                                class="hidden origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                tabindex="-1">
                                <div class="px-4 py-2 border-b">
                                    <span class="block text-sm text-gray-500">Masuk sebagai:</span>
                                    <span class="block text-sm font-medium text-gray-900 truncate">
                                        {{ Auth::user()->name }}
                                    </span>
                                </div>
                                <a href="{{ route('admin.dashboard') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem"
                                    tabindex="-1">
                                    Dashboard
                                </a>
                                <form method="POST" action="{{ route('logout') }}" role="none">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50"
                                        role="menuitem" tabindex="-1">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>

            </div>

            {{-- TOMBOL MENU MOBILE --}}
            <button id="mobile-menu-button" class="lg:hidden p-2 rounded-md text-gray-700 hover:bg-gray-100">
                <span class="sr-only">Buka menu utama</span>
                <svg id="icon-menu" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
                <svg id="icon-x" class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

        </div>
    </div>

    {{-- =================================== --}}
    {{-- MENU MOBILE DROPDOWN --}}
    {{-- =================================== --}}
    <div id="mobile-menu" class="hidden lg:hidden bg-slate-950/95 border-t border-white/10">
        <div class="px-2 pt-2 pb-3 space-y-1">
            @foreach ($navItems as $item)
                <a href="{{ $item['href'] }}"
                    class="nav-link block px-3 py-2 rounded-md text-gray-700 hover:text-red-600 hover:bg-red-50">
                    {{ $item['name'] }}
                </a>
            @endforeach
        </div>

        {{-- AUTH MENU MOBILE --}}
        <div class="border-t px-3 py-4">
            @guest
                {{-- Tombol Sekunder (Secondary): Ghost/Outline --}}
                <a href="{{ route('login.form') }}"
                    class="block w-full text-center px-4 py-2 rounded-md font-semibold text-red-600
                                   border border-red-500
                                   hover:bg-red-50 hover:text-red-700
                                   transition duration-300 ease-in-out">
                    Login
                </a>
            @else
                {{-- PERBAIKAN: Tombol Logout diganti User Menu --}}
                <div class="space-y-1">
                    <div class="px-3 py-2">
                        <span class="block text-sm text-gray-500">Masuk sebagai:</span>
                        <span class="block text-sm font-medium text-gray-900 truncate">
                            {{ Auth::user()->name }}
                        </span>
                    </div>
                    <a href="{{ route('admin.dashboard') }}"
                        class="block px-3 py-2 rounded-md text-gray-700 hover:text-red-600 hover:bg-red-50">
                        Dashboard
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="block w-full text-left px-3 py-2 rounded-md text-red-600 hover:text-red-700 hover:bg-red-50
                                       font-medium transition duration-300 ease-in-out">
                            Logout
                        </button>
                    </form>
                </div>
            @endguest
        </div>
    </div>
</nav>
