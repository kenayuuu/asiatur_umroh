<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Calon;
use App\Models\PackageKegiatan;
use Illuminate\Http\Request;

class CalonController extends Controller
{
    public function index()
    {
        $calons = Calon::with('packageKegiatan')->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.calons.index', compact('calons'));
    }

    public function create()
    {
        $packages = PackageKegiatan::orderBy('nama_paket')->get();
        return view('admin.calons.create', compact('packages'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'umur' => 'nullable|integer|min:0|max:150',
            'alamat' => 'nullable|string',
            'no_paspor' => 'nullable|string|max:100',
            'no_kk' => 'nullable|string|max:100',
            'no_ktp' => 'nullable|string|max:100',
            'akta_kelahiran' => 'nullable|string|max:100',
            'no_telepon' => 'required|string|max:30',
            'email' => 'required|email|max:255',
            'jenis_perjalanan' => 'required|in:wisata,umroh,haji',
            'tanggal_berangkat' => 'nullable|date',
            'package_kegiatan_id' => 'required|exists:package_kegiatans,id',
            'catatan' => 'nullable|string',
        ]);

        Calon::create($validated);

        return redirect()->route('admin.calons.index')->with('success', 'Data calon peserta berhasil disimpan.');
    }

    public function show(Calon $calon)
    {
        return view('admin.calons.show', compact('calon'));
    }

    public function edit(Calon $calon)
    {
        $packages = PackageKegiatan::orderBy('nama_paket')->get();
        return view('admin.calons.edit', compact('calon', 'packages'));
    }

    public function update(Request $request, Calon $calon)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'umur' => 'nullable|integer|min:0|max:150',
            'alamat' => 'nullable|string',
            'no_paspor' => 'nullable|string|max:100',
            'no_kk' => 'nullable|string|max:100',
            'no_ktp' => 'nullable|string|max:100',
            'akta_kelahiran' => 'nullable|string|max:100',
            'no_telepon' => 'required|string|max:30',
            'email' => 'required|email|max:255',
            'jenis_perjalanan' => 'required|in:wisata,umroh,haji',
            'tanggal_berangkat' => 'nullable|date',
            'package_kegiatan_id' => 'required|exists:package_kegiatans,id',
            'catatan' => 'nullable|string',
        ]);

        $calon->update($validated);

        return redirect()->route('admin.calons.index')->with('success', 'Data calon peserta berhasil diperbarui.');
    }

    public function destroy(Calon $calon)
    {
        $calon->delete();
        return redirect()->route('admin.calons.index')->with('success', 'Data calon peserta berhasil dihapus.');
    }
}
