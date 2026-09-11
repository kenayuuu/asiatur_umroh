<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Calon;
use App\Models\CalonCadangan;
use App\Models\PackageKegiatan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CalonController extends Controller
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
    public function index(Request $request)
    {
        $packages = PackageKegiatan::orderBy('nama_paket')->get();
        $selectedPackageId = $request->query('package_id');

        $query = Calon::with('packageKegiatan')->orderBy('created_at', 'asc');
        if ($selectedPackageId) {
            $query->where('package_kegiatan_id', $selectedPackageId);
        }

        $calons = $query->paginate(15)->withQueryString();

        return view('admin.calons.index', compact('calons', 'packages', 'selectedPackageId'));
    }

    public function exportPdf(Request $request)
    {
        $selectedPackageId = $request->query('package_id');

        $query = Calon::with('packageKegiatan')->orderBy('created_at', 'asc');
        if ($selectedPackageId) {
            $query->where('package_kegiatan_id', $selectedPackageId);
        }

        $calons = $query->get();
        $package = $selectedPackageId ? PackageKegiatan::find($selectedPackageId) : null;

        $filename = 'daftar-calon-peserta' . ($package ? '-' . str_replace(' ', '-', strtolower($package->nama_paket)) : '') . '-' . now()->format('YmdHis') . '.pdf';

        $pdf = Pdf::loadView('admin.calons.export-pdf', compact('calons', 'package'));

        return $pdf->download($filename);
    }

    public function create()
    {
        $packages = PackageKegiatan::orderBy('nama_paket')->get();

        $calonCadangan = CalonCadangan::where('status', 'pending')
            ->orderBy('created_at', 'asc')
            ->get();

        return view('admin.calons.create', compact(
            'packages',
            'calonCadangan'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'calon_cadangan_id' => 'nullable|exists:calon_cadangan,id',
            'nama_lengkap' => 'required|string|max:255',
            'umur' => 'nullable|integer|min:0|max:150',
            'alamat' => 'nullable|string',
            'no_paspor' => 'nullable|string|max:100',
            'no_kk' => 'nullable|string|max:100',
            'no_ktp' => 'nullable|string|max:100',
            'akta_kelahiran' => 'nullable|string|max:100',
            'no_telepon' => 'required|string|max:30',
            'email' => 'nullable|email:rfc,dns|max:255',
            'jenis_perjalanan' => 'required|in:wisata,umroh,haji',
            'tanggal_berangkat' => 'nullable|date',
            'package_kegiatan_id' => 'required|exists:package_kegiatans,id',
            'catatan' => 'nullable|string',
        ]);

        $calonCadangan = null;

        if (!empty($validated['calon_cadangan_id'])) {
            $calonCadangan = CalonCadangan::findOrFail(
                $validated['calon_cadangan_id']
            );
        }

        $calon = Calon::create([
            'nama_lengkap' => $validated['nama_lengkap'],
            'umur' => $validated['umur'] ?? null,
            'alamat' => $validated['alamat'] ?? null,
            'no_paspor' => $validated['no_paspor'] ?? null,
            'no_kk' => $validated['no_kk'] ?? null,
            'no_ktp' => $validated['no_ktp'] ?? null,
            'akta_kelahiran' => $validated['akta_kelahiran'] ?? null,
            'no_telepon' => $validated['no_telepon'],
            'email' => $validated['email'] ?? null,
            'jenis_perjalanan' => $validated['jenis_perjalanan'],
            'tanggal_berangkat' => $validated['tanggal_berangkat'] ?? null,
            'package_kegiatan_id' => $validated['package_kegiatan_id'],
            'catatan' => $validated['catatan'] ?? null,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Hubungkan dengan calon cadangan
        |--------------------------------------------------------------------------
        */

        if ($calonCadangan) {
            $calonCadangan->update([
                'calon_id' => $calon->id,
                'status' => 'menjadi_calon',
            ]);
        }

        return redirect()
            ->route('admin.calons.index')
            ->with('success', 'Data calon peserta berhasil disimpan.');
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
            'email' => 'required|email:rfc,dns|max:255',
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
