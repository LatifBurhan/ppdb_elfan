@extends('layouts.app')

@section('content')
    <div class="max-w-full mx-auto">
        {{-- Header --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
            <div>
                <h1 class="text-3xl font-black text-slate-900 tracking-tight">Data Siswa Pendaftar</h1>
                <p class="text-slate-500 text-sm mt-1 font-medium">Manajemen data pendaftar Elfan Academy.</p>
            </div>
            <button
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl font-bold text-sm shadow-lg shadow-blue-100 transition-all">
                Export Data
            </button>
        </div>

        {{-- Table Card --}}
        <div class="bg-white border border-slate-200 shadow-sm overflow-hidden" style="border-radius: 1.5rem;">
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse" id="pendaftaranTable">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-100">
                                <th class="px-6 py-4 text-xs font-black text-slate-400 uppercase tracking-widest">Siswa</th>
                                <th class="px-6 py-4 text-xs font-black text-slate-400 uppercase tracking-widest">Sekolah &
                                    Jurusan</th>
                                <th
                                    class="px-6 py-4 text-xs font-black text-slate-400 uppercase tracking-widest text-center">
                                    Status</th>
                                <th
                                    class="px-6 py-4 text-xs font-black text-slate-400 uppercase tracking-widest text-right">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse($pendaftarans as $pendaftar)
                                <tr class="hover:bg-blue-50/20 transition-all group">
                                    <td class="px-6 py-5">
                                        <div class="flex items-center gap-4">
                                            <div
                                                class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center text-white font-black text-sm shadow-md">
                                                {{ substr($pendaftar->nama_lengkap, 0, 1) }}
                                            </div>
                                            <div>
                                                <p class="font-bold text-slate-900 leading-tight">
                                                    {{ $pendaftar->nama_lengkap }}</p>
                                                <p
                                                    class="text-[10px] text-slate-400 mt-0.5 font-bold uppercase tracking-tighter">
                                                    KTP: {{ $pendaftar->no_ktp }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5">
                                        <p class="text-sm font-bold text-slate-700 leading-tight">
                                            {{ $pendaftar->asal_sekolah }}</p>
                                        <p class="text-xs text-blue-500 font-medium mt-0.5">{{ $pendaftar->jurusan }}</p>
                                    </td>
                                    <td class="px-6 py-5 text-center">
                                        <span
                                            class="px-3 py-1 rounded-lg text-[10px] font-black uppercase tracking-tighter {{ $pendaftar->status == 'pending' ? 'bg-amber-100 text-amber-600' : 'bg-emerald-100 text-emerald-600' }}">
                                            {{ $pendaftar->status ?? 'Pending' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-5 text-right">
                                        <div class="flex items-center justify-end gap-2">
                                            <button onclick="showDetail({{ $pendaftar->id }})"
                                                class="p-2 bg-slate-100 text-slate-500 hover:bg-blue-600 hover:text-white rounded-lg transition-all"
                                                title="Detail Siswa">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </button>
                                        </div>
                                        <form action="{{ route('admin.updateStatus', $pendaftar->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            <input type="hidden" name="status" value="lolos">
                                            <button type="submit" onclick="return confirm('Loloskan siswa ini?')"
                                                class="p-2 bg-emerald-50 text-emerald-600 hover:bg-emerald-600 hover:text-white rounded-lg transition-all"
                                                title="Loloskan">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                            </button>
                                        </form>

                                        {{-- Form untuk Menggagalkan --}}
                                        <form action="{{ route('admin.updateStatus', $pendaftar->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            <input type="hidden" name="status" value="gagal">
                                            <button type="submit" onclick="return confirm('Gagalkan pendaftaran ini?')"
                                                class="p-2 bg-red-50 text-red-600 hover:bg-red-600 hover:text-white rounded-lg transition-all"
                                                title="Gagalkan">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-10 text-slate-400 italic">Belum ada data
                                        pendaftar.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL DETAIL (Hidden by default) --}}
    <div id="detailModal"
        class="hidden fixed inset-0 z-[999] flex items-center justify-center bg-slate-900/60 backdrop-blur-sm p-4">
        <div
            class="bg-white w-full max-w-3xl rounded-[2.5rem] shadow-2xl overflow-hidden animate-in fade-in zoom-in duration-300">
            <div class="p-8 border-b border-slate-100 flex justify-between items-center bg-slate-50">
                <h2 class="text-xl font-black text-slate-900 tracking-tight">Detail Lengkap Siswa</h2>
                <button type="button" onclick="closeModal()"
                    class="w-10 h-10 flex items-center justify-center rounded-full bg-slate-200 text-slate-500 hover:bg-red-500 hover:text-white transition-all font-bold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            {{-- ID modalContent harus ada untuk JS --}}
            <div id="modalContent" class="p-8">
                {{-- Konten akan diisi oleh JS --}}
            </div>
        </div>
    </div>

    <script>
        async function showDetail(id) {
            const modal = document.getElementById('detailModal');
            const content = document.getElementById('modalContent');

            modal.classList.remove('hidden');
            content.innerHTML =
                '<div class="text-center py-20 font-bold text-slate-400 animate-pulse">Memuat data...</div>';

            try {
                const response = await fetch(`/admin/pendaftar/${id}`);
                const data = await response.json();

                content.innerHTML = `
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 overflow-y-auto max-h-[65vh] pr-2">
                    <div class="space-y-4">
                        <h3 class="text-[10px] font-black text-blue-600 uppercase tracking-[0.2em] border-b pb-2">Informasi Pribadi</h3>
                        <div><p class="text-[10px] text-slate-400 uppercase font-bold">Nama Lengkap</p><p class="font-bold text-slate-700">${data.nama_lengkap}</p></div>
                        <div><p class="text-[10px] text-slate-400 uppercase font-bold">Email</p><p class="font-bold text-slate-700">${data.email_pendaftar}</p></div>
                        <div><p class="text-[10px] text-slate-400 uppercase font-bold">Tempat, Tanggal Lahir</p><p class="font-bold text-slate-700">${data.tempat_lahir}, ${data.tanggal_lahir}</p></div>
                        <div><p class="text-[10px] text-slate-400 uppercase font-bold">Alamat Rumah</p><p class="font-bold text-slate-700 text-sm">${data.alamat_lengkap}</p></div>
                    </div>

                    <div class="space-y-4">
                        <h3 class="text-[10px] font-black text-blue-600 uppercase tracking-[0.2em] border-b pb-2">Pendidikan</h3>
                        <div><p class="text-[10px] text-slate-400 uppercase font-bold">Asal Sekolah</p><p class="font-bold text-slate-700">${data.asal_sekolah}</p></div>
                        <div><p class="text-[10px] text-slate-400 uppercase font-bold">Jurusan</p><p class="font-bold text-slate-700">${data.jurusan}</p></div>
                        <div><p class="text-[10px] text-slate-400 uppercase font-bold">Alamat Sekolah</p><p class="font-bold text-slate-700 text-sm">${data.alamat_sekolah}</p></div>
                    </div>

                    <div class="space-y-4 md:col-span-2 bg-slate-50 p-6 rounded-3xl border border-slate-100">
                        <h3 class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] border-b border-slate-200 pb-2 mb-4">Data Orang Tua</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div><p class="text-[10px] text-slate-400 uppercase font-bold">Nama Ayah</p><p class="font-bold text-slate-700">${data.nama_bapak} <span class="text-xs font-medium text-slate-400">(${data.pekerjaan_bapak})</span></p></div>
                            <div><p class="text-[10px] text-slate-400 uppercase font-bold">Nama Ibu</p><p class="font-bold text-slate-700">${data.nama_ibu} <span class="text-xs font-medium text-slate-400">(${data.pekerjaan_ibu})</span></p></div>
                        </div>
                    </div>
                </div>`;
            } catch (error) {
                content.innerHTML =
                    '<div class="text-center py-20 text-red-500 font-bold">Terjadi kesalahan saat mengambil data.</div>';
            }
        }

        function closeModal() {
            document.getElementById('detailModal').classList.add('hidden');
        }

        window.onclick = function(event) {
            const modal = document.getElementById('detailModal');
            if (event.target == modal) {
                closeModal();
            }
        }
    </script>
@endsection
