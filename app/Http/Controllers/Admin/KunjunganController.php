<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kunjungan;
use Illuminate\Http\Request;

class KunjunganController extends Controller
{
    public function index()
    {
        $kunjungans = Kunjungan::orderBy('tanggal', 'desc')->paginate(15);
        return view('admin.kunjungans.index', compact('kunjungans'));
    }

    public function create()
    {
        return view('admin.kunjungans.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tempat' => 'required|string|max:255',
            'pimpinan' => 'required|string|max:255',
            'no_hp' => 'required|string|max:30',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        Kunjungan::create($validated);

        return redirect()->route('admin.kunjungans.index')->with('success', 'Kunjungan berhasil ditambahkan.');
    }

    public function show(Kunjungan $kunjungan)
    {
        return view('admin.kunjungans.show', compact('kunjungan'));
    }

    public function edit(Kunjungan $kunjungan)
    {
        return view('admin.kunjungans.edit', compact('kunjungan'));
    }

    public function update(Request $request, Kunjungan $kunjungan)
    {
        $validated = $request->validate([
            'tempat' => 'required|string|max:255',
            'pimpinan' => 'required|string|max:255',
            'no_hp' => 'required|string|max:30',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        $kunjungan->update($validated);

        return redirect()->route('admin.kunjungans.index')->with('success', 'Kunjungan berhasil diperbarui.');
    }

    public function destroy(Kunjungan $kunjungan)
    {
        $kunjungan->delete();

        return redirect()->route('admin.kunjungans.index')->with('success', 'Kunjungan berhasil dihapus.');
    }
}
