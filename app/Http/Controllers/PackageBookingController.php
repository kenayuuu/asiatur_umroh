<?php

namespace App\Http\Controllers;

use App\Models\CalonCadangan;
use App\Models\PackageKegiatan;
use Illuminate\Http\Request;

class PackageBookingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'package_id' => 'required|exists:package_kegiatans,id',
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_telepon' => 'required|string|max:30',
            'umur' => 'required|integer|min:1|max:120',
            'alamat' => 'required|string',

            'no_ktp' => 'nullable|string|max:50',
            'no_kk' => 'nullable|string|max:50',
            'no_paspor' => 'nullable|string|max:50',
            'akta_kelahiran' => 'nullable|string|max:50',
            'catatan' => 'nullable|string',
        ]);

        $package = PackageKegiatan::findOrFail(
            $validated['package_id']
        );

        $calonCadangan = CalonCadangan::create([
            'nama_lengkap' => $validated['nama_lengkap'],
            'umur' => $validated['umur'],
            'alamat' => $validated['alamat'],
            'no_ktp' => $validated['no_ktp'] ?? null,
            'no_kk' => $validated['no_kk'] ?? null,
            'no_paspor' => $validated['no_paspor'] ?? null,
            'akta_kelahiran' => $validated['akta_kelahiran'] ?? null,
            'no_telepon' => $validated['no_telepon'],
            'email' => $validated['email'],
            'jenis_perjalanan' => $package->kategori,
            'tanggal_berangkat' => $package->tanggal_berlangsung,
            'package_kegiatan_id' => $package->id,
            'catatan' => $validated['catatan'] ?? null,
            'registered_by' => auth()->id(),
            'status' => 'pending',
        ]);

        // Nanti kita buat URL WhatsApp berdasarkan data ini.
        // Untuk sementara cek dulu apakah data berhasil masuk.
       return redirect()
    ->route('package.show', ['package' => $package->id])
    ->with('booking_success', true); 
    }
}