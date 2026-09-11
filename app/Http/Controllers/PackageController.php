<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\CalonCadangan;
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

    public function submitBooking(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_telepon' => 'required|string|max:20',
            'umur' => 'required|integer|min:1|max:150',
            'alamat' => 'required|string|max:255',

            'package_id' => 'required|exists:package_kegiatans,id',

            'no_paspor' => 'nullable|string|max:50',
            'no_ktp' => 'nullable|string|max:50',
            'no_kk' => 'nullable|string|max:50',
            'akta_kelahiran' => 'nullable|string|max:50',

            'catatan' => 'nullable|string|max:1000',
        ]);

        // Ambil paket yang dipilih
        $package = PackageKegiatan::findOrFail(
            $validated['package_id']
        );

        // Simpan data pendaftaran ke calon_cadangan
        CalonCadangan::create([
            'nama_lengkap' => $validated['nama_lengkap'],
            'umur' => $validated['umur'],
            'alamat' => $validated['alamat'],

            'no_paspor' => $validated['no_paspor'] ?? null,
            'no_kk' => $validated['no_kk'] ?? null,
            'no_ktp' => $validated['no_ktp'] ?? null,
            'akta_kelahiran' => $validated['akta_kelahiran'] ?? null,

            'no_telepon' => $validated['no_telepon'],
            'email' => $validated['email'],

            // Mengambil data dari paket
            'jenis_perjalanan' => $package->kategori,
            'tanggal_berangkat' => $package->tanggal_berlangsung,

            // Paket yang dipilih
            'package_kegiatan_id' => $package->id,

            'catatan' => $validated['catatan'] ?? null,

            // Pendaftaran dari website, bukan dari user yang login
            'registered_by' => null,

            // Menunggu verifikasi admin
            'status' => 'pending',
        ]);

        // Kembali ke halaman sebelumnya
        return redirect()
            ->back()
            ->with(
                'success',
                'Pendaftaran berhasil dikirim. Data Anda sedang menunggu proses verifikasi oleh admin.'
            );
    }
}