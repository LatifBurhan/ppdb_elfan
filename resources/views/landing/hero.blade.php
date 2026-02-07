<section class="relative overflow-hidden bg-white pt-16 pb-24 lg:pt-24 lg:pb-32" id="herosection">
    <div class="absolute top-0 right-0 -translate-y-12 translate-x-12 blur-3xl opacity-20 pointer-events-none">
        <div class="aspect-square w-[600px] rounded-full bg-gradient-to-tr from-blue-600 to-indigo-400"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

            <div class="text-left">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50 text-blue-600 rounded-full text-sm font-bold mb-8 animate-fade-in">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-600"></span>
                    </span>
                    Pendaftaran Angkatan 2026 Telah Dibuka
                </div>

                <h1 class="text-5xl lg:text-7xl font-extrabold text-slate-900 leading-[1.1] mb-8">
                    Bangun Masa Depan <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-500">
                        Digitalmu Sekarang
                    </span>
                </h1>

                <p class="text-lg text-slate-600 mb-10 leading-relaxed max-w-xl">
                    Bergabunglah dengan **Elfan Academy**, tempat para inovator muda menguasai keahlian UI/UX Design, Web Development, hingga teknologi AI terbaru untuk bersaing di industri global.
                </p>

                <div class="flex flex-wrap gap-4 mb-12">
                    <a href="{{ route('register') }}" class="group relative px-8 py-4 bg-blue-600 text-white rounded-2xl font-bold shadow-xl shadow-blue-200 hover:bg-blue-700 transition-all overflow-hidden">
                        <span class="relative z-10">Daftar Sekarang</span>
                        <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-10 transition-opacity"></div>
                    </a>
                    <a href="#flow" class="px-8 py-4 bg-white text-slate-700 border border-slate-200 rounded-2xl font-bold hover:bg-slate-50 transition-all flex items-center gap-2">
                        Lihat Alur Pendaftaran
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>

                <div class="flex items-center gap-8 border-t border-slate-100 pt-8">
                    <div>
                        <p class="text-2xl font-bold text-slate-900">500+</p>
                        <p class="text-sm text-slate-500 font-medium">Alumni Sukses</p>
                    </div>
                    <div class="w-px h-10 bg-slate-200"></div>
                    <div>
                        <p class="text-2xl font-bold text-slate-900">12+</p>
                        <p class="text-sm text-slate-500 font-medium">Partner Industri</p>
                    </div>
                    <div class="w-px h-10 bg-slate-200"></div>
                    <div>
                        <p class="text-2xl font-bold text-slate-900">A</p>
                        <p class="text-sm text-slate-500 font-medium">Akreditasi</p>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="relative z-20 rounded-[2.5rem] overflow-hidden shadow-2xl shadow-blue-100 border-[12px] border-white">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                         alt="Siswa Elfan Academy"
                         class="w-full h-full object-cover aspect-[4/5]">
                </div>

                <div class="absolute -left-12 top-1/4 z-30 bg-white p-4 rounded-2xl shadow-xl shadow-slate-200/50 border border-slate-50 hidden md:block animate-bounce-slow">
                    <div class="flex flex-col gap-2">
                        <span class="px-3 py-1 bg-green-50 text-green-600 rounded-lg text-xs font-bold">UI/UX Design</span>
                        <span class="px-3 py-1 bg-blue-50 text-blue-600 rounded-lg text-xs font-bold">Web Developer</span>
                    </div>
                </div>

                <div class="absolute -right-8 bottom-12 z-30 bg-white p-5 rounded-2xl shadow-xl shadow-slate-200/50 border border-slate-50 flex items-center gap-4 hidden md:flex animate-fade-in-up">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400 font-semibold uppercase tracking-wider">Status Pendaftaran</p>
                        <p class="text-sm font-bold text-slate-800">Verifikasi Berhasil</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<style>
    @keyframes bounce-slow {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }
    .animate-bounce-slow {
        animation: bounce-slow 4s ease-in-out infinite;
    }
</style>
