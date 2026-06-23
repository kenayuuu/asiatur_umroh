<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PackageKegiatan;
use App\Models\Calon;
use App\Models\Kunjungan;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Statistik Dashboard
        |--------------------------------------------------------------------------
        */
        $stats = [
            'packages'   => PackageKegiatan::count(),
            'calons'     => Calon::count(),
            'kunjungans' => Kunjungan::count(),
            'users'      => User::count(),
        ];

        /*
        |--------------------------------------------------------------------------
        | Recent Jamaah
        |--------------------------------------------------------------------------
        */
        $recentCalons = Calon::with('packageKegiatan')
            ->latest()
            ->take(5)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Statistik Paket
        |--------------------------------------------------------------------------
        */
        $packageStats = [
            'wisata' => PackageKegiatan::where('kategori', 'wisata')->count(),
            'umroh'  => PackageKegiatan::where('kategori', 'umroh')->count(),
            'haji'   => PackageKegiatan::where('kategori', 'haji')->count(),
        ];

        /*
        |--------------------------------------------------------------------------
        | Chart Jamaah 6 Bulan Terakhir
        |--------------------------------------------------------------------------
        */
        $bulanLabels = [];
        $jamaahPerBulan = [];

        for ($i = 5; $i >= 0; $i--) {

            $bulan = Carbon::now()->subMonths($i);

            $bulanLabels[] = $bulan->translatedFormat('M Y');

            $jamaahPerBulan[] = Calon::whereYear('created_at', $bulan->year)
                ->whereMonth('created_at', $bulan->month)
                ->count();
        }

        /*
        |--------------------------------------------------------------------------
        | Generate Image URL
        |--------------------------------------------------------------------------
        | Mendukung:
        | 1. Seeder -> public/images
        | 2. Upload CRUD -> storage/packages
        | 3. image_url eksternal
        |--------------------------------------------------------------------------
        */

        $packages = PackageKegiatan::latest()->get();

        foreach ($packages as $package) {
            $package->image_path = $package->image_url;
        }

        return view('admin.dashboard.index', compact(
            'stats',
            'recentCalons',
            'packageStats',
            'bulanLabels',
            'jamaahPerBulan',
            'packages'
        ));
    }
}
