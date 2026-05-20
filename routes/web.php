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

/*
|--------------------------------------------------------------------------
| Landing Page (umum)
|--------------------------------------------------------------------------
*/

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/paket-wisata', [PackageController::class, 'wisata'])->name('paket.wisata');
Route::get('/paket-umroh-haji', [PackageController::class, 'umrohHaji'])->name('paket.umroh-haji');
Route::get('/paket/{package}', [PackageController::class, 'show'])->name('package.show');
Route::get('/bisnis-lainnya', [PackageController::class, 'businesses'])->name('bisnis.lainnya');
Route::get('/profil-kontak', [PackageController::class, 'contact'])->name('profil.kontak');


/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
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
        Route::resource('calons', CalonController::class);
        Route::resource('kunjungans', KunjunganController::class);
        Route::resource('businesses', BusinessController::class);
    });
