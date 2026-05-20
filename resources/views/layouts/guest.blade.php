<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Judul akan diambil dari halaman (login/register) --}}
    <title>@yield('title') - {{ config('app.name', 'ASIATUR') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-800 bg-gray-100"> {{-- Latar belakang abu-abu --}}

    {{--
    Layout ini TIDAK memiliki @include('partials.navbar').
    Layout ini hanya akan menampilkan konten form.
    --}}
    <main class="min-h-screen flex flex-col justify-center items-center px-4 py-12">

        {{-- Menampilkan Logo di atas form --}}
        <div class="mb-6">
            <a href="{{ route('landing') }}" class="inline-flex items-center space-x-2">
                <img src="{{ asset('images/asiatur2.png') }}" class="h-12 w-auto" alt="Logo ASIATUR">
                <span class="text-red-600 text-2xl font-bold">
                    {{ __('app.name') ?? 'ASIATUR' }}
                </span>
            </a>
        </div>

        {{-- Ini adalah 'card' versi Tailwind --}}
        <div class="w-full max-w-md p-8 bg-white shadow-xl rounded-2xl">
            @yield('content')
        </div>

    </main>

    {{-- Floating WhatsApp Button --}}
    @include('partials.whatsapp-float')

</body>

</html>
