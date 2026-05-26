@extends('layouts.app')

@section('content')
<div class="bg-white border border-slate-200 rounded-3xl p-8 shadow-sm grid grid-cols-1 md:grid-cols-3 gap-8">
    <div class="md:col-span-2">
        <div class="h-64 bg-slate-100 rounded-2xl flex items-center justify-center text-slate-400 font-bold mb-6">Gambar Poster Event Akbar</div>
        <h1 class="text-3xl font-extrabold text-slate-800 mb-2">National Seminar UI/UX Design 2026</h1>
        <p class="text-slate-600 leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div class="bg-slate-50 border border-slate-200 rounded-2xl p-6 h-fit">
        <h3 class="font-bold text-slate-800 text-lg mb-4">Informasi Tiket</h3>
        <div class="space-y-3 text-sm text-slate-600 mb-6">
            <div class="flex justify-between"><span>Harga:</span> <strong class="text-emerald-600 text-base">Rp 50.000</strong></div>
            <div class="flex justify-between"><span>Sisa Kuota:</span> <strong class="text-slate-800">45 Kursi</strong></div>
            <div class="flex justify-between"><span>Lokasi:</span> <strong class="text-slate-800">Aula Amikom</strong></div>
        </div>
        <a href="/checkout" class="block text-center bg-indigo-600 text-white font-bold py-3 rounded-xl hover:bg-indigo-700 shadow-md shadow-indigo-100 transition">Beli Tiket Sekarang</a>
    </div>
</div>
@endsection