<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 flex items-center justify-center min-h-screen p-4">
    <div class="bg-white p-8 rounded-3xl shadow-xl w-full max-w-md border border-slate-100">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-600 rounded-2xl text-white text-2xl font-bold mb-4 shadow-lg shadow-blue-200">E</div>
            <h2 class="text-2xl font-bold text-slate-800">Daftar Akun Baru</h2>
            <p class="text-slate-500 text-sm mt-1">Bergabung dengan Elfan AI Academy</p>
        </div>

        <form action="{{ route('register') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-slate-700 ml-1">Nama Lengkap</label>
                <input type="text" name="name" class="w-full px-4 py-3 mt-1 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white outline-none transition-all" placeholder="Masukkan nama Anda" required>
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 ml-1">Email</label>
                <input type="email" name="email" class="w-full px-4 py-3 mt-1 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white outline-none transition-all" placeholder="nama@email.com" required>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 ml-1">Password</label>
                    <input type="password" name="password" class="w-full px-4 py-3 mt-1 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white outline-none transition-all" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 ml-1">Konfirmasi</label>
                    <input type="password" name="password_confirmation" class="w-full px-4 py-3 mt-1 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white outline-none transition-all" required>
                </div>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-4 rounded-xl font-bold hover:bg-blue-700 shadow-lg shadow-blue-200 transition-all active:scale-[0.98]">
                Buat Akun Sekarang
            </button>

            <p class="text-center text-sm text-slate-600">
                Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-600 font-bold hover:underline">Masuk di sini</a>
            </p>
        </form>
    </div>
</body>
</html>
