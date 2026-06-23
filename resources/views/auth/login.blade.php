@extends('layouts.guest') {{-- Tetap pakai layout guest --}}

@section('title', 'Login')

@section('content')

    {{-- =================================== --}}
    {{-- 💡 TOMBOL KEMBALI YANG DITAMBAHKAN 💡 --}}
    {{-- =================================== --}}
    <div class="mb-5"> {{-- Memberi jarak ke judul di bawah --}}
        <a href="{{ route('landing') }}"
            class="inline-flex items-center text-sm font-medium text-gray-600 hover:text-red-600 transition-colors">

            {{-- Ikon Panah (inline SVG, tidak perlu file) --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>

            Kembali ke Beranda
        </a>
    </div>
    {{-- =================================== --}}
    {{-- AKHIR BAGIAN TOMBOL KEMBALI --}}
    {{-- =================================== --}}

    <h3 class="text-3xl font-bold text-center text-gray-900 mb-6">
        Login
    </h3>

    {{-- Tampilan Error --}}
    @if ($errors->any())
        <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg text-center" role="alert">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500"
                required>
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
            <input type="password" name="password" id="password"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500"
                required>
        </div>

        <button type="submit"
            class="w-full px-6 py-3 rounded-2xl bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white font-semibold transition duration-300">
            Login
        </button>
    </form>
@endsection
