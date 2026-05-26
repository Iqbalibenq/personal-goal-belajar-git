<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amikom Event Hub - User Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 font-sans min-h-screen flex flex-col">

    <nav class="bg-white shadow-sm border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
            <span class="text-xl font-black text-indigo-600 tracking-tight">AmikomEventHub</span>
            <div class="space-x-1 font-medium text-sm text-slate-600">
                <a href="/" class="hover:text-indigo-600 px-3 py-2 rounded-lg transition">Home</a>
                <a href="/event/1" class="hover:text-indigo-600 px-3 py-2 rounded-lg transition">Detail Event</a>
                <a href="/checkout" class="hover:text-indigo-600 px-3 py-2 rounded-lg transition">Checkout</a>
                <a href="/my-ticket" class="hover:text-indigo-600 px-3 py-2 rounded-lg transition">Tiket Saya</a>
                <a href="/admin" class="bg-slate-900 text-white hover:bg-slate-800 px-3 py-2 rounded-lg transition ml-4">Portal Admin ➔</a>
            </div>
        </div>
    </nav>

    <main class="flex-grow max-w-6xl w-full mx-auto px-4 py-8">
        @yield('content')
    </main>

    <footer class="bg-white border-t border-slate-200 py-6 text-center text-sm text-slate-500">
        &copy; 2026 AmikomEventHub. Created by Ahmad Iqbal (24.12.3249).
    </footer>

</body>
</html>