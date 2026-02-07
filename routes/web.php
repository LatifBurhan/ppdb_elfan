<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PendaftaranController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. Landing Page (Halaman Utama)
Route::get('/', function () {
    return view('index');
});

// 2. Akses Tamu (Hanya bisa diakses jika BELUM login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// 3. Akses Terautentikasi (Harus Login)
Route::middleware('auth')->group(function () {

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard Siswa (Menampilkan ringkasan data jika sudah daftar)
    Route::get('/dashboard', function () {
        $pendaftaran = \App\Models\Pendaftaran::where('user_id', auth()->id())->first();
        return view('dashboard', compact('pendaftaran'));
    })->name('dashboard');

    // Alur Pendaftaran Siswa
    Route::get('/pendaftaran', [PendaftaranController::class, 'create'])->name('pendaftaran.create');
    Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');

    // 4. Group Khusus Admin (Middleware Role Admin)
    Route::middleware('role:admin')->prefix('admin')->group(function () {

        // Halaman Statistik/Dashboard Admin
        Route::get('/dashboard', [PendaftaranController::class, 'dashboard'])->name('admin.dashboard');

        // Halaman Tabel Data Pendaftar
        Route::get('/pendaftar', [PendaftaranController::class, 'index'])->name('admin.index');

        Route::get('/pendaftar/{id}', [PendaftaranController::class, 'show'])->name('admin.show');
        
        // Rute untuk update status pendaftaran
    Route::post('/pendaftar/{id}/update-status', [PendaftaranController::class, 'updateStatus'])->name('admin.updateStatus');
    });
});
