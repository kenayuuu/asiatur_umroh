<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            // Kecualikan super admin nikena608@gmail.com dari validasi is_admin_created
            if (! $user->is_admin_created && $user->email !== 'nikena608@gmail.com') {
                Auth::logout();
                return back()->withErrors(['email' => 'Akun ini tidak terdaftar oleh administrator.'])->onlyInput('email');
            }

            if (! $user->email_verified_at) {
                Auth::logout();
                return redirect()->route('otp.form')->with([
                    'otp_email' => $user->email,
                    'success' => 'Masukkan kode OTP yang telah dikirim ke email Anda.',
                ]);
            }

            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function showOtpForm(Request $request)
    {
        $email = session('otp_email');
        if ($request->has('email')) {
            $email = $request->query('email');
            session(['otp_email' => $email]);
        }

        return view('auth.otp', compact('email'));
    }

    public function verifyOtp(Request $request)
    {
        $email = session('otp_email');

        $validated = $request->validate([
            'otp_code' => 'required|string|min:6|max:6',
        ]);

        if (! $email) {
            return redirect()->route('login.form')->withErrors(['email' => 'Email pengguna tidak tersedia. Silakan buka kembali link OTP dari email Anda.']);
        }

        $user = User::where('email', $email)->first();

        if (! $user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan.'])->withInput();
        }

        // Kecualikan super admin nikena608@gmail.com dari validasi is_admin_created
        if (! $user->is_admin_created && $user->email !== 'nikena608@gmail.com') {
            return redirect()->route('login.form')->withErrors(['email' => 'Akun ini tidak valid. Silakan minta administrator membuat akun Anda terlebih dahulu.']);
        }

        if (! $user->otp_code || ! $user->otp_expires_at || now()->greaterThan($user->otp_expires_at)) {
            return back()->withErrors(['otp_code' => 'Kode OTP tidak valid atau sudah kedaluwarsa.'])->withInput();
        }

        if ($validated['otp_code'] !== $user->otp_code) {
            return back()->withErrors(['otp_code' => 'Kode OTP salah.'])->withInput();
        }

        $user->email_verified_at = now();
        $user->otp_code = null;
        $user->otp_expires_at = null;
        $user->save();

        Auth::login($user);
        $request->session()->regenerate();
        session()->forget('otp_email');

        return redirect()->route('admin.dashboard')->with('success', 'Akun berhasil diaktifkan dan Anda telah masuk secara otomatis.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('landing');
    }
}
