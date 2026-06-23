<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BusinessController extends Controller
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

    public function index()
    {
        $businesses = Business::latest()->paginate(10);
        return view('admin.businesses.index', compact('businesses'));
    }

    public function create()
    {
        return view('admin.businesses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_active' => 'required|boolean',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $destination = $_SERVER['DOCUMENT_ROOT'] . '/uploads/business';

            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }

            $file->move($destination, $filename);

            $imagePath = 'uploads/business/' . $filename;
        }

        Business::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'image' => $imagePath, // FIXED (ini yang sebelumnya salah)
            'is_active' => $request->is_active,
        ]);

        return redirect()
            ->route('admin.businesses.index')
            ->with('success', 'Business berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $business = Business::findOrFail($id);
        return view('admin.businesses.show', compact('business'));
    }

    public function edit(string $id)
    {
        $business = Business::findOrFail($id);
        return view('admin.businesses.edit', compact('business'));
    }

    public function update(Request $request, string $id)
    {
        $business = Business::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_active' => 'required|boolean',
        ]);

        $imagePath = $business->image;

        if ($request->hasFile('image')) {

            // hapus gambar lama (kalau ada)
            if ($business->image && file_exists(public_path($business->image))) {
                unlink(public_path($business->image));
            }

            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $destination = $_SERVER['DOCUMENT_ROOT'] . '/uploads/business';

            if (!file_exists($destination)) {
                mkdir($destination, 0777, true);
            }

            $file->move($destination, $filename);

            $imagePath = 'uploads/business/' . $filename;
        }

        $business->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'image' => $imagePath,
            'is_active' => $request->is_active,
        ]);

        return redirect()
            ->route('admin.businesses.index')
            ->with('success', 'Business berhasil diupdate.');
    }

    public function destroy(string $id)
    {
        $business = Business::findOrFail($id);

        if ($business->image && file_exists(public_path($business->image))) {
            unlink(public_path($business->image));
        }

        $business->delete();

        return redirect()
            ->route('admin.businesses.index')
            ->with('success', 'Business berhasil dihapus.');
    }
}
