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

    public function submitBooking(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email',
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

        $package = PackageKegiatan::find($validated['package_id']);

        // Generate pesan WhatsApp
        $message = "Assalamu'alaikum warahmatullahi wabarakatuh.\n\n";
        $message .= "Halo Admin ASIATUR \n\n";
        $message .= "Saya telah melakukan pengisian formulir pendaftaran melalui website ASIATUR dengan data sebagai berikut:\n\n";

        $message .= " *Nama Lengkap:* " . $validated['nama_lengkap'] . "\n";
        $message .= " *Email:* " . $validated['email'] . "\n";
        $message .= " *Nomor WhatsApp:* " . $validated['no_telepon'] . "\n";
        $message .= " *Umur:* " . $validated['umur'] . " Tahun\n";
        $message .= " *Alamat:* " . $validated['alamat'] . "\n\n";

        $message .= " *Paket yang Dipilih:* " . $package->nama_paket . "\n";
        $message .= " *Tanggal Keberangkatan:* " . ($package->tanggal_berlangsung?->format('d M Y') ?? 'TBA') . "\n\n";

        $message .= " *Nomor Paspor:* " . ($validated['no_paspor'] ?? '-') . "\n";
        $message .= " *Nomor KTP:* " . ($validated['no_ktp'] ?? '-') . "\n";
        $message .= " *Nomor KK:* " . ($validated['no_kk'] ?? '-') . "\n";
        $message .= " *Akta Kelahiran:* " . ($validated['akta_kelahiran'] ?? '-') . "\n\n";

        $message .= " *Catatan:*\n";
        $message .= ($validated['catatan'] ?? '-') . "\n\n";

        $message .= "Mohon informasi lebih lanjut mengenai proses pendaftaran dan tahapan berikutnya.\n\n";
        $message .= "Terima kasih.\n";
        $message .= "Wassalamu'alaikum warahmatullahi wabarakatuh.";

        // Generate WhatsApp link
        $whatsappLink = 'https://wa.me/628116619260?text=' . urlencode($message);

        return redirect($whatsappLink);
    }
}
