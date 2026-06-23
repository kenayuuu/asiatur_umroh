<!doctype html>
{{-- Tambahkan scroll-smooth agar #link berfungsi mulus --}}
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'ASIATUR Tours & Travel')</title>

    {{-- Logo Browser --}}
    <link rel="icon" href="{{ asset('/images/asiatur2.png') }}" type="image/png">

    {{--
    PERBAIKAN: Ganti CDN dengan @vite.
    Ini akan memuat CSS & JS yang sudah di-build dan dioptimasi.
    --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{--
    {{-- File CSS kustom Anda sudah di-import dari resources/css/app.css.
    --}}
</head>

<body class="font-sans antialiased text-slate-100 bg-slate-950">

    @include('partials.navbar')

    <main class="min-h-screen bg-slate-950">
        @yield('content')
    </main>

    @include('partials.footer')

    {{--
    SEMUA JAVASCRIPT KUSTOM ANDA SEKARANG DIMUAT DARI app.js
    YANG DIPANGGIL OLEH @vite DI DALAM

    <head>.
        --}}

    {{--
        @stack ini dibiarkan aktif agar halaman lain
        bisa menambahkan skrip khusus jika perlu.
        --}}
    @stack('scripts')

    {{-- Floating WhatsApp Button --}}
    @include('partials.whatsapp-float')

</body>

</html>
