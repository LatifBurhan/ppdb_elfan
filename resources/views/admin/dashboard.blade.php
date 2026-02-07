@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="mb-10">
        <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Ringkasan Eksekutif</h1>
        <p class="text-slate-500 mt-1">Selamat datang kembali, {{ auth()->user()->name }}. Berikut adalah statistik pendaftaran hari ini.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <div class="bg-white p-6 rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 group hover:border-blue-500 transition-all">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <span class="text-[10px] font-black text-emerald-500 bg-emerald-50 px-2 py-1 rounded-lg">+12%</span>
            </div>
            <p class="text-sm font-bold text-slate-400 uppercase tracking-wider">Total Siswa</p>
            <h3 class="text-3xl font-black text-slate-900">{{ $totalPendaftar ?? 0 }}</h3>
        </div>

        <div class="bg-white p-6 rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 group hover:border-amber-500 transition-all">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-amber-50 rounded-2xl flex items-center justify-center text-amber-500 group-hover:bg-amber-500 group-hover:text-white transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <p class="text-sm font-bold text-slate-400 uppercase tracking-wider">Pending</p>
            <h3 class="text-3xl font-black text-slate-900">{{ $totalPending ?? 0 }}</h3>
        </div>

        <div class="bg-white p-6 rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 group hover:border-emerald-500 transition-all">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-500 group-hover:bg-emerald-500 group-hover:text-white transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <p class="text-sm font-bold text-slate-400 uppercase tracking-wider">Lolos</p>
            <h3 class="text-3xl font-black text-slate-900">{{ $totalLolos ?? 0 }}</h3>
        </div>

        <div class="bg-white p-6 rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 group hover:border-red-500 transition-all">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-red-50 rounded-2xl flex items-center justify-center text-red-500 group-hover:bg-red-500 group-hover:text-white transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <p class="text-sm font-bold text-slate-400 uppercase tracking-wider">Gagal</p>
            <h3 class="text-3xl font-black text-slate-900">{{ $totalGagal ?? 0 }}</h3>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 bg-slate-900 p-8 rounded-[2.5rem] text-white flex items-center justify-between overflow-hidden relative">
            <div class="relative z-10">
                <h2 class="text-2xl font-bold mb-2">Siap Melakukan Seleksi?</h2>
                <p class="text-slate-400 mb-6 max-w-sm">Periksa berkas pendaftaran dan tentukan masa depan kandidat Elfan AI Academy sekarang.</p>
                <a href="{{ route('admin.dashboard') }}" class="inline-block bg-blue-600 px-6 py-3 rounded-2xl font-bold hover:bg-blue-700 transition-all">Buka Data Pendaftar</a>
            </div>
            <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-blue-600/20 rounded-full blur-3xl"></div>
        </div>

        <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-xl shadow-slate-200/50">
            <h3 class="font-bold text-slate-900 mb-4">Informasi Sistem</h3>
            <div class="space-y-4">
                <div class="flex justify-between text-sm">
                    <span class="text-slate-500">Versi Aplikasi</span>
                    <span class="font-bold text-slate-900 text-xs">v1.2.0-Alpha</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-slate-500">Status Server</span>
                    <span class="font-bold text-emerald-500 text-xs uppercase italic">Online</span>
                </div>
                <div class="flex justify-between text-sm border-t pt-4">
                    <span class="text-slate-500 italic text-xs leading-relaxed">Terakhir diperbarui: 07 Feb 2026</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
