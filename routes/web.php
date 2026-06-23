<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PackageKegiatanController;
use App\Http\Controllers\Admin\CalonController;
use App\Http\Controllers\Admin\KunjunganController;
use App\Http\Controllers\Admin\BusinessController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Hash;

// Route::get('/generate-hash', function () {
//     return Hash::make('hahahihi');
// });

// Route::get('/cek-public', function () {
//     return [
//         'public_path' => public_path(),
//         'manifest_exists' => file_exists(public_path('build/manifest.json')),
//         'manifest_path' => public_path('build/manifest.json'),
//     ];
// });

/*
|--------------------------------------------------------------------------
| Landing Page (umum)
|--------------------------------------------------------------------------
*/

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/paket-wisata', [PackageController::class, 'wisata'])->name('paket.wisata');
Route::get('/paket-umroh-haji', [PackageController::class, 'umrohHaji'])->name('paket.umroh-haji');
Route::get('/paket/{package}', [PackageController::class, 'show'])->name('package.show');
Route::post('/paket-booking', [PackageController::class, 'submitBooking'])->name('package.booking');
Route::get('/bisnis-lainnya', [PackageController::class, 'businesses'])->name('bisnis.lainnya');
Route::get('/profil-kontak', [PackageController::class, 'contact'])->name('profil.kontak');


/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/otp-verification', [AuthController::class, 'showOtpForm'])->name('otp.form');
Route::post('/otp-verification', [AuthController::class, 'verifyOtp'])->name('otp.verify');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| Pelanggan Routes (Customer)
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Admin Routes (semua admin) - konsolidasi
|--------------------------------------------------------------------------
|
| Semua rute admin berada di sini dengan middleware 'auth'. Controller
| melakukan pengecekan per-action (canManageOperational, canManageContent, ...)
| sehingga role seperti Pimpinan tetap bisa mengakses index/show tanpa
| pendaftaran rute duplikat.
|
*/
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::resource('packages', PackageKegiatanController::class);
        Route::get('calons/export-pdf', [CalonController::class, 'exportPdf'])->name('calons.exportPdf');
        Route::resource('calons', CalonController::class);
        Route::resource('users', UserController::class);
        Route::get('profile/reset-password', [ProfileController::class, 'showResetPasswordForm'])->name('profile.password.reset');
        Route::post('profile/reset-password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
        Route::get('kunjungans/export-pdf', [KunjunganController::class, 'exportPdf'])->name('kunjungans.exportPdf');
        Route::resource('kunjungans', KunjunganController::class);
        Route::resource('businesses', BusinessController::class);
    });
