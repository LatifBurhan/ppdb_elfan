<nav class="fixed w-full z-50 top-0 left-0 bg-white/70 backdrop-blur-lg border-b border-slate-200/50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-center h-20">
            <div class="flex items-center gap-2">
                <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-200">
                    <span class="text-white font-bold text-xl">E</span>
                </div>
                <span class="text-xl font-bold text-slate-900 tracking-tight">Elfan<span
                        class="text-blue-600">Academy</span></span>
            </div>

            <div class="hidden md:flex items-center gap-8">
                <a href="{{ url('/#herosection') }}"
                    class="text-sm font-semibold text-slate-600 hover:text-blue-600 transition-colors">Beranda</a>
                <a href="{{ url('/#flowsection') }}"
                    class="text-sm font-semibold text-slate-600 hover:text-blue-600 transition-colors">Flow</a>
                <a href="{{ url('/#programssection') }}"
                    class="text-sm font-semibold text-slate-600 hover:text-blue-600 transition-colors">Programs</a>
                <a href="{{ url('/#faqsection') }}"
                    class="text-sm font-semibold text-slate-600 hover:text-blue-600 transition-colors">FAQ</a>
                <a href="{{ url('/#gallerysection') }}"
                    class="text-sm font-semibold text-slate-600 hover:text-blue-600 transition-colors">Gallery</a>
            </div>

            <div class="hidden md:flex items-center gap-3">
                @auth
                    <a href="{{ route('dashboard') }}"
                        class="px-6 py-2.5 text-sm font-bold text-slate-700 hover:bg-slate-100 rounded-xl transition-all">
                        Dashboard
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit"
                            class="px-6 py-2.5 text-sm font-bold text-white bg-red-500 rounded-xl shadow-lg shadow-red-200 hover:bg-red-600 transition-all">
                            Keluar
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                        class="px-6 py-2.5 text-sm font-bold text-slate-700 hover:bg-slate-100 rounded-xl transition-all">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}"
                        class="px-6 py-2.5 text-sm font-bold text-white bg-blue-600 rounded-xl shadow-lg shadow-blue-200 hover:bg-blue-700 transition-all">
                        Daftar Sekarang
                    </a>
                @endauth
            </div>

            <div class="md:hidden flex items-center">
                <button id="mobile-menu-button" class="text-slate-600 hover:text-blue-600 focus:outline-none">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="mobile-menu" class="hidden md:hidden bg-white border-b border-slate-200 px-6 py-6 space-y-4">
        <a href="{{ url('/#herosection') }}" class="block text-base font-semibold text-slate-600">Beranda</a>
        <a href="{{ url('/#flowsection') }}" class="block text-base font-semibold text-slate-600">Flow</a>
        <a href="{{ url('/#programssection') }}" class="block text-base font-semibold text-slate-600">Programs</a>
        <a href="{{ url('/#faqsection') }}" class="block text-base font-semibold text-slate-600">FAQ</a>
        <a href="{{ url('/#gallerysection') }}" class="block text-base font-semibold text-slate-600">Gallery</a>

    </div>
</nav>

<div class="h-20"></div>

<script>
    const btn = document.getElementById('mobile-menu-button');
    const menu = document.getElementById('mobile-menu');
    const links = menu.querySelectorAll('a');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });

    links.forEach(link => {
        link.addEventListener('click', () => {
            menu.classList.add('hidden');
        });
    });
</script>
