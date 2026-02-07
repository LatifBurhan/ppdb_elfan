<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Actions\CreatePendaftaranAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class PendaftaranController extends Controller
{
public function index()
{
    // Mengambil data pendaftar beserta user-nya
    $pendaftarans = Pendaftaran::with('user')->latest()->get();

    // Mengarahkan ke file resources/views/admin/index.blade.php
    return view('admin.index', compact('pendaftarans'));
}

public function dashboard()
{
    $totalPendaftar = Pendaftaran::count();
    $totalPending   = Pendaftaran::where('status', 'pending')->count();
    $totalLolos     = Pendaftaran::where('status', 'lolos')->count();
    $totalGagal     = Pendaftaran::where('status', 'gagal')->count();

    return view('admin.dashboard', compact('totalPendaftar', 'totalPending', 'totalLolos', 'totalGagal'));
}

    public function create()
{
    // Ambil data pendaftaran milik user yang sedang login
    $pendaftaran = \App\Models\Pendaftaran::where('user_id', auth()->id())->first();

    // Kirim data ke view form, jika belum ada nilainya null
    return view('siswa.form', compact('pendaftaran'));
}

    public function store(Request $request, CreatePendaftaranAction $action)
{
    // Ambil data pendaftaran lama (jika ada) untuk pengecekan validasi unique
    $pendaftaran = \App\Models\Pendaftaran::where('user_id', auth()->id())->first();

    $validated = $request->validate([
        // Data Pribadi
        'nama_lengkap'    => 'required|string|max:255',
        'tempat_lahir'    => 'required|string',
        'tanggal_lahir'   => 'required|date',
        'jenis_kelamin'   => 'required|in:Laki-laki,Perempuan',
        'email_pendaftar' => 'required|email',
        'tinggi_badan'    => 'required|numeric',
        'berat_badan'     => 'required|numeric',
        // Update validasi no_ktp agar mengabaikan ID kita sendiri saat update
        'no_ktp'          => 'required|numeric|digits:16|unique:pendaftarans,no_ktp,' . ($pendaftaran->id ?? 'NULL'),
        'no_telp'         => 'required|digits_between:10,15',
        'instagram'       => 'nullable|string',
        'alamat_lengkap'  => 'required|string',

        // Data Orang Tua
        'nama_bapak'      => 'required|string',
        'pekerjaan_bapak' => 'required|string',
        'no_telp_bapak'   => 'required|digits_between:10,15',
        'alamat_bapak'    => 'nullable|string',
        'nama_ibu'        => 'required|string',
        'pekerjaan_ibu'   => 'required|string',
        'no_telp_ibu'     => 'required|digits_between:10,15',
        'alamat_ibu'      => 'nullable|string',

        // Data Sekolah
        'asal_sekolah'    => 'required|string',
        'jurusan'         => 'required|string',
        'alamat_sekolah'  => 'required|string',
    ]);

    // Jalankan Action
    $action->execute($validated);

    return redirect()->route('dashboard')->with('success', 'Data pendaftaran berhasil diperbarui!');
}


public function show($id)
{
    $pendaftaran = Pendaftaran::findOrFail($id);

    // Mengembalikan data dalam format JSON untuk dibaca oleh JavaScript
    return response()->json($pendaftaran);
}



public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:pending,lolos,gagal'
    ]);

    $pendaftaran = Pendaftaran::findOrFail($id);
    $pendaftaran->status = $request->status;
    $pendaftaran->save();

    return redirect()->back()->with('success', 'Status pendaftaran ' . $pendaftaran->nama_lengkap . ' berhasil diperbarui!');
}

}
