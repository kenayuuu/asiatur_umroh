<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Calon;
use App\Models\PackageKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PackageKegiatanController extends Controller
{
    public function index()
    {
        $packages = PackageKegiatan::orderBy('created_at', 'desc')->paginate(12);
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_paket' => 'required|string|max:255',
            'tanggal_berlangsung' => 'nullable|date',
            'destinasi' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'deposit' => 'nullable|numeric|min:0',
            'kategori' => 'required|in:wisata,umroh,haji',
            'durasi' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'rundown' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_active' => 'nullable',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $destination = $_SERVER['DOCUMENT_ROOT'] . '/uploads/packages';

            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }

            $file->move($destination, $filename);

            $imagePath = 'uploads/packages/' . $filename;
        }

        $validated['image'] = $imagePath;

        $validated['slug'] =
            Str::slug($validated['nama_paket']) . '-' . Str::random(4);

        $validated['is_active'] = $request->has('is_active');

        PackageKegiatan::create($validated);

        return redirect()
            ->route('admin.packages.index')
            ->with('success', 'Paket berhasil ditambahkan.');
    }

    public function show(PackageKegiatan $package)
    {
        $calons = Calon::where('package_kegiatan_id', $package->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.packages.show', compact('package', 'calons'));
    }

    public function edit(PackageKegiatan $package)
    {
        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, PackageKegiatan $package)
    {
        $validated = $request->validate([
            'nama_paket' => 'required|string|max:255',
            'tanggal_berlangsung' => 'nullable|date',
            'destinasi' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'deposit' => 'nullable|numeric|min:0',
            'kategori' => 'required|in:wisata,umroh,haji',
            'durasi' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'rundown' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_active' => 'nullable',
        ]);

        $imagePath = $package->image;

        if ($request->hasFile('image')) {

            // hapus file lama
            if ($package->image && file_exists(public_path($package->image))) {
                unlink(public_path($package->image));
            }

            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $destination = $_SERVER['DOCUMENT_ROOT'] . '/uploads/packages';

            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }

            $file->move($destination, $filename);

            $imagePath = 'uploads/packages/' . $filename;
        }

        $validated['image'] = $imagePath;
        $validated['is_active'] = $request->has('is_active');

        $package->update($validated);

        return redirect()
            ->route('admin.packages.index')
            ->with('success', 'Paket berhasil diperbarui.');
    }

    public function destroy(PackageKegiatan $package)
    {
        if ($package->image && file_exists(public_path($package->image))) {
            unlink(public_path($package->image));
        }

        $package->delete();

        return redirect()
            ->route('admin.packages.index')
            ->with('success', 'Paket berhasil dihapus.');
    }
}
