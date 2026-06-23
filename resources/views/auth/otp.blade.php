@extends('layouts.guest')

@section('title', 'Verifikasi OTP')

@section('content')
    <div class="mb-5">
        <a href="{{ route('landing') }}"
            class="inline-flex items-center text-sm font-medium text-gray-600 hover:text-red-600 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Beranda
        </a>
    </div>

    <h3 class="text-3xl font-bold text-center text-gray-900 mb-6">
        Verifikasi OTP
    </h3>

    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg text-center" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg text-center" role="alert">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('otp.verify') }}" method="POST" class="space-y-6">
        @csrf

        @if (isset($email))
            <input type="hidden" name="email" value="{{ $email }}">
            <div class="p-4 mb-4 text-sm text-gray-700 bg-gray-50 rounded-lg">
                Kode OTP dikirim ke email: <strong>{{ $email }}</strong>
            </div>
        @else
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                Email pengguna tidak tersedia. Silakan buka kembali link OTP dari email Anda.
            </div>
        @endif

        <div>
            <label for="otp_code" class="block text-sm font-medium text-gray-700 mb-2">Kode OTP</label>
            <input type="text" name="otp_code" id="otp_code" value="{{ old('otp_code') }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500"
                maxlength="6" required>
        </div>

        <button type="submit"
            class="w-full px-6 py-3 rounded-2xl bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white font-semibold transition duration-300">
            Verifikasi OTP
        </button>
    </form>
@endsection
