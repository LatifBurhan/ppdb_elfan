@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto px-4 pb-20">
        <div class="mb-10 text-center">
            <h1 class="text-3xl font-bold text-slate-900">Formulir Pendaftaran</h1>
            <p class="text-slate-500 mt-2">Silakan lengkapi data di bawah ini untuk bergabung dengan Elfan AI Academy.</p>
        </div>

        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-r-xl">
                <p class="font-bold">Terjadi kesalahan input:</p>
                <ul class="list-disc list-inside text-sm mt-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pendaftaran.store') }}" method="POST" class="space-y-8">
            @csrf



            <div class="max-w-4xl mx-auto px-4 py-8 space-y-8">

                <div
                    class="bg-white/80 backdrop-blur-sm p-8 rounded-3xl shadow-xl shadow-slate-200/50 border border-slate-100">
                    <div class="flex items-center gap-4 mb-10">
                        <div
                            class="w-12 h-12 bg-blue-600 rounded-2xl flex items-center justify-center shadow-lg shadow-blue-200 flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-slate-800">Edit Data Pribadi</h2>
                            <p class="text-slate-500 text-sm">Perbarui informasi diri Anda dengan benar</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                        <div class="md:col-span-2 group">
                            <label class="block text-sm font-bold text-slate-700 mb-2 group-focus-within:text-blue-600">Nama
                                Lengkap</label>
                            <input type="text" name="nama_lengkap"
                                value="{{ old('nama_lengkap', $pendaftaran->nama_lengkap ?? '') }}"
                                placeholder="Masukkan nama sesuai KTP"
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all duration-200 outline-none @error('nama_lengkap') border-red-500 @enderror"
                                required>
                        </div>

                        <div class="group">
                            <label class="block text-sm font-bold text-slate-700 mb-2">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir"
                                value="{{ old('tempat_lahir', $pendaftaran->tempat_lahir ?? '') }}"
                                placeholder="Contoh: Jakarta"
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all outline-none @error('tempat_lahir') border-red-500 @enderror">
                        </div>

                        <div class="group">
                            <label class="block text-sm font-bold text-slate-700 mb-2">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir"
                                value="{{ old('tanggal_lahir', $pendaftaran->tanggal_lahir ?? '') }}"
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all outline-none @error('tanggal_lahir') border-red-500 @enderror">
                        </div>

                        <div class="group">
                            <label class="block text-sm font-bold text-slate-700 mb-2">Jenis Kelamin</label>
                            <select name="jenis_kelamin"
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all outline-none">
                                <option value="Laki-laki"
                                    {{ old('jenis_kelamin', $pendaftaran->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki</option>
                                <option value="Perempuan"
                                    {{ old('jenis_kelamin', $pendaftaran->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                        </div>

                        <div class="group">
                            <label class="block text-sm font-bold text-slate-700 mb-2">E-Mail</label>
                            <input type="email" name="email_pendaftar"
                                value="{{ old('email_pendaftar', $pendaftaran->email_pendaftar ?? '') }}"
                                placeholder="email@contoh.com"
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all outline-none @error('email_pendaftar') border-red-500 @enderror">
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="group">
                                <label class="block text-sm font-bold text-slate-700 mb-2">Tinggi (cm)</label>
                                <input type="number" name="tinggi_badan"
                                    value="{{ old('tinggi_badan', $pendaftaran->tinggi_badan ?? '') }}" placeholder="0"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all outline-none">
                            </div>
                            <div class="group">
                                <label class="block text-sm font-bold text-slate-700 mb-2">Berat (kg)</label>
                                <input type="number" name="berat_badan"
                                    value="{{ old('berat_badan', $pendaftaran->berat_badan ?? '') }}" placeholder="0"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all outline-none">
                            </div>
                        </div>

                        <div class="group">
                            <label class="block text-sm font-bold text-slate-700 mb-2">No. KTP</label>
                            <input type="text" name="no_ktp" value="{{ old('no_ktp', $pendaftaran->no_ktp ?? '') }}"
                                placeholder="16 digit nomor KTP"
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all outline-none @error('no_ktp') border-red-500 @enderror">
                        </div>

                        <div class="group">
                            <label class="block text-sm font-bold text-slate-700 mb-2">No. Telepon / WA</label>
                            <input type="text" name="no_telp" value="{{ old('no_telp', $pendaftaran->no_telp ?? '') }}"
                                placeholder="0812..."
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all outline-none @error('no_telp') border-red-500 @enderror">
                        </div>

                        <div class="group">
                            <label class="block text-sm font-bold text-slate-700 mb-2">Instagram</label>
                            <input type="text" name="instagram"
                                value="{{ old('instagram', $pendaftaran->instagram ?? '') }}" placeholder="@username"
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all outline-none">
                        </div>

                        <div class="md:col-span-2 group">
                            <label class="block text-sm font-bold text-slate-700 mb-2">Alamat Lengkap</label>
                            <textarea name="alamat_lengkap" rows="3" placeholder="Tuliskan alamat lengkap"
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all outline-none @error('alamat_lengkap') border-red-500 @enderror">{{ old('alamat_lengkap', $pendaftaran->alamat_lengkap ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white/80 backdrop-blur-sm p-8 rounded-3xl shadow-xl shadow-slate-200/50 border border-slate-100">
                    <div class="flex items-center gap-4 mb-10">
                        <div
                            class="w-12 h-12 bg-blue-100 rounded-2xl flex items-center justify-center text-lg text-blue-600 font-bold shadow-sm shadow-blue-50 flex-shrink-0">
                            2
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-slate-800">Data Orang Tua / Wali</h2>
                            <p class="text-slate-500 text-sm">Informasi kontak orang tua atau wali murid</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-10">
                        <div class="space-y-6">
                            <h3 class="font-bold text-slate-800 border-b border-slate-100 pb-3 flex items-center gap-2">
                                <div class="w-1.5 h-6 bg-blue-500 rounded-full"></div>
                                Data Ayah
                            </h3>
                            <div class="group">
                                <label class="block text-sm font-bold text-slate-700 mb-2">Nama Ayah</label>
                                <input type="text" name="nama_bapak"
                                    value="{{ old('nama_bapak', $pendaftaran->nama_bapak ?? '') }}"
                                    placeholder="Nama lengkap ayah"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all outline-none @error('nama_bapak') border-red-500 @enderror">
                            </div>
                            <div class="group">
                                <label class="block text-sm font-bold text-slate-700 mb-2">Pekerjaan</label>
                                <input type="text" name="pekerjaan_bapak"
                                    value="{{ old('pekerjaan_bapak', $pendaftaran->pekerjaan_bapak ?? '') }}"
                                    placeholder="Pekerjaan ayah"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all outline-none">
                            </div>
                            <div class="group">
                                <label class="block text-sm font-bold text-slate-700 mb-2">No. WA Ayah</label>
                                <input type="text" name="no_telp_bapak"
                                    value="{{ old('no_telp_bapak', $pendaftaran->no_telp_bapak ?? '') }}"
                                    placeholder="0812..."
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all outline-none @error('no_telp_bapak') border-red-500 @enderror">
                            </div>
                            <div class="group">
                                <label class="block text-sm font-bold text-slate-700 mb-2">Alamat Ayah</label>
                                <textarea name="alamat_bapak" rows="2" placeholder="Alamat lengkap ayah"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all outline-none">{{ old('alamat_bapak', $pendaftaran->alamat_bapak ?? '') }}</textarea>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <h3 class="font-bold text-slate-800 border-b border-slate-100 pb-3 flex items-center gap-2">
                                <div class="w-1.5 h-6 bg-pink-500 rounded-full"></div>
                                Data Ibu
                            </h3>
                            <div class="group">
                                <label class="block text-sm font-bold text-slate-700 mb-2">Nama Ibu</label>
                                <input type="text" name="nama_ibu"
                                    value="{{ old('nama_ibu', $pendaftaran->nama_ibu ?? '') }}"
                                    placeholder="Nama lengkap ibu"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all outline-none @error('nama_ibu') border-red-500 @enderror">
                            </div>
                            <div class="group">
                                <label class="block text-sm font-bold text-slate-700 mb-2">Pekerjaan</label>
                                <input type="text" name="pekerjaan_ibu"
                                    value="{{ old('pekerjaan_ibu', $pendaftaran->pekerjaan_ibu ?? '') }}"
                                    placeholder="Pekerjaan ibu"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all outline-none">
                            </div>
                            <div class="group">
                                <label class="block text-sm font-bold text-slate-700 mb-2">No. WA Ibu</label>
                                <input type="text" name="no_telp_ibu"
                                    value="{{ old('no_telp_ibu', $pendaftaran->no_telp_ibu ?? '') }}"
                                    placeholder="0812..."
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all outline-none @error('no_telp_ibu') border-red-500 @enderror">
                            </div>
                            <div class="group">
                                <label class="block text-sm font-bold text-slate-700 mb-2">Alamat Ibu</label>
                                <textarea name="alamat_ibu" rows="2" placeholder="Alamat lengkap ibu"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all outline-none">{{ old('alamat_ibu', $pendaftaran->alamat_ibu ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto px-4 py-8 space-y-8">
                    <div
                        class="bg-white/80 backdrop-blur-sm p-8 rounded-3xl shadow-xl shadow-slate-200/50 border border-slate-100">

                        <h2 class="text-xl md:text-2xl font-bold mb-10 text-blue-600 flex items-center gap-4">
                            <span
                                class="w-12 h-12 bg-blue-100 rounded-2xl flex items-center justify-center text-lg text-blue-600 font-bold shadow-sm shadow-blue-50 flex-shrink-0">
                                3
                            </span>
                            Data Sekolah / Instansi
                        </h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">

                            <div class="group">
                                <label
                                    class="block text-sm font-bold text-slate-700 mb-2 group-focus-within:text-blue-600">
                                    Asal Sekolah
                                </label>
                                <input type="text" name="asal_sekolah"
                                    value="{{ old('asal_sekolah', $pendaftaran->asal_sekolah ?? '') }}"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all duration-200 outline-none"
                                    placeholder="Masukkan nama sekolah asal" required>
                            </div>

                            <div class="group">
                                <label
                                    class="block text-sm font-bold text-slate-700 mb-2 group-focus-within:text-blue-600">
                                    Jurusan
                                </label>
                                <input type="text" name="jurusan"
                                    value="{{ old('jurusan', $pendaftaran->jurusan ?? '') }}"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all duration-200 outline-none"
                                    placeholder="Contoh: Rekayasa Perangkat Lunak" required>
                            </div>

                            <div class="md:col-span-2 group">
                                <label
                                    class="block text-sm font-bold text-slate-700 mb-2 group-focus-within:text-blue-600">
                                    Alamat Sekolah
                                </label>
                                <textarea name="alamat_sekolah" rows="3"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all duration-200 outline-none"
                                    placeholder="Tuliskan alamat lengkap sekolah asal" required>{{ old('alamat_sekolah', $pendaftaran->alamat_sekolah ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 text-white py-4 rounded-2xl font-bold text-lg hover:bg-blue-700 shadow-xl shadow-blue-200 transition-all active:scale-[0.99]">
                    Simpan & Kirim Pendaftaran
                </button>
        </form>
    </div>
@endsection
