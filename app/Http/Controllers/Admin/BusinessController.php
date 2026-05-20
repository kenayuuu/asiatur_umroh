<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $businesses = Business::latest()->paginate(10);

        return view('admin.business.index', compact('businesses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.business.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_active' => 'required|boolean',
        ]);

        $image = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image')
                ->store('business', 'public');
        }

        Business::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'image' => $image,
            'is_active' => $request->is_active,
        ]);

        return redirect()
            ->route('admin.business.index')
            ->with('success', 'Business berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $business = Business::findOrFail($id);

        return view('admin.business.show', compact('business'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $business = Business::findOrFail($id);

        return view('admin.business.edit', compact('business'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $business = Business::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_active' => 'required|boolean',
        ]);

        $image = $business->image;

        if ($request->hasFile('image')) {

            // hapus gambar lama
            if ($business->image && Storage::disk('public')->exists($business->image)) {
                Storage::disk('public')->delete($business->image);
            }

            $image = $request->file('image')
                ->store('business', 'public');
        }

        $business->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'image' => $image,
            'is_active' => $request->is_active,
        ]);

        return redirect()
            ->route('admin.business.index')
            ->with('success', 'Business berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $business = Business::findOrFail($id);

        // hapus gambar
        if ($business->image && Storage::disk('public')->exists($business->image)) {
            Storage::disk('public')->delete($business->image);
        }

        $business->delete();

        return redirect()
            ->route('admin.business.index')
            ->with('success', 'Business berhasil dihapus.');
    }
}
