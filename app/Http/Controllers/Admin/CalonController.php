<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Calon;
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
            'email' => 'required|email:rfc,dns|max:255',
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
