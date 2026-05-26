<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Event Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 font-sans min-h-screen flex text-slate-100">

    <aside class="w-64 bg-slate-950 border-r border-slate-800 p-6 flex flex-col justify-between">
        <div>
            <div class="text-xl font-black text-indigo-400 tracking-wider mb-8">ADMIN PANEL</div>
            <nav class="space-y-2 text-sm font-medium">
                <a href="/admin" class="block py-2.5 px-4 rounded-xl bg-slate-900 text-indigo-400 border border-slate-800">Dashboard</a>
                <a href="/admin/events" class="block py-2.5 px-4 rounded-xl text-slate-400 hover:bg-slate-900 hover:text-white transition">Manajemen Event</a>
                <a href="/admin/categories" class="block py-2.5 px-4 rounded-xl text-slate-400 hover:bg-slate-900 hover:text-white transition font-bold text-emerald-400">❖ Manajemen Kategori</a>
            </nav>
        </div>
        <div class="text-xs text-slate-500 border-t border-slate-800 pt-4">
            User: Iqbal (24.12.3249)
            <a href="/" class="block mt-2 text-indigo-400 hover:underline">➔ Kembali ke Web User</a>
        </div>
    </aside>

    <div class="flex-grow flex flex-col min-h-screen">
        <header class="bg-slate-950 border-b border-slate-800 px-8 py-4 flex justify-between items-center">
            <h2 class="font-bold text-lg text-slate-200">Sistem Informasi Event Hub</h2>
            <div class="text-xs bg-slate-800 px-3 py-1.5 rounded-lg border border-slate-700">Role: Super Admin</div>
        </header>

        <main class="p-8 flex-grow">
            @yield('content')
        </main>
    </div>

</body>
</html>