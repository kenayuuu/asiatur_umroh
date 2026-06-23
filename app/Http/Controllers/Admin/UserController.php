<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\SendOtpNotification;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeAdmin();
    }

    private function authorizeAdmin()
    {
        if (auth()->check() && auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized access');
        }
    }
    public function index()
    {
        $users = User::orderBy('created_at', 'asc')->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email:rfc,dns|max:255|unique:users,email',
            'phone' => 'nullable|string|max:30',
            'address' => 'nullable|string',
            'role' => 'required|in:admin,user',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $otpCode = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $validated['otp_code'] = $otpCode;
        $validated['otp_expires_at'] = now()->addMinutes(15);
        $validated['email_verified_at'] = null;
        $validated['is_admin_created'] = true;

        $user = User::create($validated);
        $user->notify(new SendOtpNotification($otpCode));

        return redirect()->route('admin.users.index')->with('success', 'User berhasil disimpan. Kode OTP sudah dikirim ke email pengguna.');
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email:rfc,dns|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:30',
            'address' => 'nullable|string',
            'role' => 'required|in:admin,user',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if (empty($validated['password'])) {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus.');
    }
}
