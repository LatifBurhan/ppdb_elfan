<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md border border-slate-100">
        <h2 class="text-2xl font-bold text-center text-slate-800 mb-6">Login Elfan Academy</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-semibold text-slate-700">Email</label>
                <input type="email" name="email" class="w-full px-4 py-2 mt-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
            </div>
            <div class="mb-6">
                <label class="block text-sm font-semibold text-slate-700">Password</label>
                <input type="password" name="password" class="w-full px-4 py-2 mt-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg font-bold hover:bg-blue-700 transition">Login</button>
            <p class="text-center text-sm mt-4 text-slate-600">Belum punya akun? <a href="/register" class="text-blue-600 font-bold">Daftar</a></p>
        </form>
    </div>
</body>
</html>
