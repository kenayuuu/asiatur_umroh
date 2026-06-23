<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function showResetPasswordForm()
    {
        return view('admin.profile.reset-password');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user->password = $validated['password'];
        $user->save();

        return redirect()->route('admin.dashboard')->with('success', 'Password berhasil diperbarui.');
    }
}
