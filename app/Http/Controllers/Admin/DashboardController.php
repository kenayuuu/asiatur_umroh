<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PackageKegiatan;
use App\Models\Calon;
use App\Models\Kunjungan;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'packages' => PackageKegiatan::count(),
            'calons' => Calon::count(),
            'kunjungans' => Kunjungan::count(),
            'users' => User::count(),
        ];

        $recentCalons = Calon::with('packageKegiatan')
            ->latest()
            ->take(5)
            ->get();

        $packageStats = [
            'wisata' => PackageKegiatan::where('kategori', 'wisata')->count(),
            'umroh' => PackageKegiatan::where('kategori', 'umroh')->count(),
            'haji' => PackageKegiatan::where('kategori', 'haji')->count(),
        ];

        return view('admin.dashboard.index', compact(
            'stats',
            'recentCalons',
            'packageStats'
        ));
    }
}
