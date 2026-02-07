@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex flex-col items-center justify-center py-12 px-6 bg-slate-50">
        <div class="max-w-4xl w-full">

            <div class="flex justify-between items-center mb-8">
                <a href="{{ url('/') }}"
                    class="flex items-center gap-2 text-slate-500 hover:text-blue-600 transition-all font-semibold text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Beranda
                </a>
                <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">Dashboard Siswa</span>
            </div>

            <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/60 border border-slate-100 overflow-hidden">
                <div class="bg-slate-900 p-10 text-white relative overflow-hidden">
                    <div class="relative z-10">
                        <h1 class="text-3xl font-bold">Halo, {{ auth()->user()->name }}! 👋</h1>
                        <p class="text-slate-400 mt-2">Pantau status pendaftaran dan kelola data diri kamu di sini.</p>
                    </div>
                    <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-blue-600/20 rounded-full blur-3xl"></div>
                </div>

                <div class="p-10">
                    @if ($pendaftaran)
                        <div
                            class="mb-8 p-4 rounded-2xl border flex items-center justify-between {{ $pendaftaran->status == 'lolos' ? 'bg-emerald-50 border-emerald-100' : ($pendaftaran->status == 'gagal' ? 'bg-red-50 border-red-100' : 'bg-amber-50 border-amber-100') }}">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-2 h-2 rounded-full animate-pulse {{ $pendaftaran->status == 'lolos' ? 'bg-emerald-500' : ($pendaftaran->status == 'gagal' ? 'bg-red-500' : 'bg-amber-500') }}">
                                </div>
            
<span class="px-3 py-1 rounded-lg text-[10px] font-black uppercase tracking-tighter
    {{ $pendaftaran->status == 'pending'
        ? 'bg-amber-100 text-amber-600'
        : ($pendaftaran->status == 'lolos'
            ? 'bg-emerald-100 text-emerald-600'
            : 'bg-red-100 text-red-600') }}">
    {{ $pendaftaran->status ?? 'Pending' }}
</span>
                            </div>
                        </div>

                        <div class="flex justify-between items-end mb-6">
                            <h2 class="text-xl font-bold text-slate-900">Data Pendaftaran</h2>
                            <a href="{{ route('pendaftaran.create') }}"
                                class="flex items-center gap-2 px-5 py-2.5 bg-blue-50 text-blue-600 rounded-xl font-bold text-sm hover:bg-blue-600 hover:text-white transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                                Edit Data
                            </a>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-4">
                                <div>
                                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-400">Nama
                                        Lengkap</label>
                                    <p class="font-bold text-slate-700">{{ $pendaftaran->nama_lengkap }}</p>
                                </div>
                                <div>
                                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-400">Asal
                                        Sekolah</label>
                                    <p class="font-bold text-slate-700">{{ $pendaftaran->asal_sekolah }}</p>
                                </div>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-400">Nomor
                                        WhatsApp</label>
                                    <p class="font-bold text-slate-700">{{ $pendaftaran->no_telp }}</p>
                                </div>
                                <div>
                                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-400">Jurusan
                                        Pilihan</label>
                                    <p class="font-bold text-slate-700">{{ $pendaftaran->jurusan }}</p>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="text-center py-10">
                            <div class="w-20 h-20 bg-blue-50 rounded-[2rem] flex items-center justify-center mx-auto mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold text-slate-900">Belum Ada Data</h2>
                            <p class="text-slate-500 mt-2 mb-8">Kamu belum mengisi formulir pendaftaran Elfan Academy.</p>
                            <a href="{{ route('pendaftaran.create') }}"
                                class="inline-block bg-blue-600 text-white px-8 py-3.5 rounded-2xl font-bold shadow-lg shadow-blue-200 hover:bg-blue-700 transition-all">
                                Isi Formulir Sekarang
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
