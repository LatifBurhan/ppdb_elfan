<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login.
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Menangani proses login manual.
     */
    public function login(Request $request)
    {
        // Validasi input email dan password
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Coba melakukan autentikasi
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Pengalihan berdasarkan role user
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('dashboard')
             ->with('success', 'Akun berhasil dibuat. Selamat datang di Elfan AI Academy!');
        }

        // Jika gagal, kembali ke login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    /**
     * Menampilkan halaman registrasi untuk umum.
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Menangani pendaftaran akun baru secara mandiri.
     */
    public function register(Request $request)
    {
        // Validasi data sesuai standar keamanan
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Membuat user baru dengan role default 'siswa'
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'siswa',
        ]);

        // Otomatis login setelah berhasil daftar
        Auth::login($user);

    // Langsung arahkan ke nama rute 'dashboard'
    return redirect()->route('dashboard')
        ->with('success', 'Akun berhasil dibuat. Selamat datang di Elfan AI Academy!');
    }

    /**
     * Menangani proses logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
