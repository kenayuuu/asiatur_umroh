<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\PackageKegiatan;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function wisata()
    {
        $packages = PackageKegiatan::where('kategori', 'wisata')
            ->where('is_active', true)
            ->orderBy('tanggal_berlangsung', 'asc')
            ->get();

        return view('paket.index-wisata', compact('packages'));
    }

    public function umrohHaji()
    {
        $packages = PackageKegiatan::whereIn('kategori', ['umroh', 'haji'])
            ->where('is_active', true)
            ->orderBy('tanggal_berlangsung', 'asc')
            ->get();

        return view('paket.index-umroh', compact('packages'));
    }

    public function show(PackageKegiatan $package)
    {
        return view('paket.show', compact('package'));
    }

    public function businesses()
    {
        $businesses = Business::where('is_active', true)->get();

        return view('bisnis.index', compact('businesses'));
    }

    public function contact()
    {
        return view('contact');
    }
}
