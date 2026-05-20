<?php

namespace App\Http\Controllers;

use App\Models\PackageKegiatan;

class LandingController extends Controller
{
    public function index()
    {
        $packages = PackageKegiatan::where('is_active', true)
            ->orderBy('tanggal_berlangsung', 'asc')
            ->take(6)
            ->get();

        return view('landing_new', compact('packages'));
    }
}
