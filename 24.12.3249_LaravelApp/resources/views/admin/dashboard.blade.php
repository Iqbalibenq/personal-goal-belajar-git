@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-extrabold text-white mb-2">Selamat Datang di Dashboard Utama</h1>
<p class="text-slate-400 text-sm mb-8">Statistik dan data ringkas operasional Amikom Event Hub hari ini.</p>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-slate-950 border border-slate-800 p-6 rounded-2xl">
        <div class="text-slate-500 text-xs font-bold uppercase tracking-wider mb-2">Total Event</div>
        <div class="text-3xl font-black text-indigo-400">12 Event</div>
    </div>
    <div class="bg-slate-950 border border-slate-800 p-6 rounded-2xl">
        <div class="text-slate-500 text-xs font-bold uppercase tracking-wider mb-2">Tiket Terjual</div>
        <div class="text-3xl font-black text-emerald-400">342 Tiket</div>
    </div>
    <div class="bg-slate-950 border border-slate-800 p-6 rounded-2xl">
        <div class="text-slate-500 text-xs font-bold uppercase tracking-wider mb-2">Total Kategori</div>
        <div class="text-3xl font-black text-purple-400">5 Kategori</div>
    </div>
</div>
@endsection