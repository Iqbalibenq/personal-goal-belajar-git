@extends('layouts.app')

@section('content')
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-3xl p-12 text-center shadow-lg mb-12">
        <h1 class="text-4xl font-extrabold mb-4">Temukan Event Kampus Terkeren di Sini!</h1>
        <p class="text-indigo-100 max-w-xl mx-auto text-lg mb-6">Platform nomor satu penyedia tiket seminar, konser, dan
            workshop Universitas Amikom Yogyakarta.</p>
    </div>

    <h2 class="text-2xl font-bold text-slate-800 mb-6">Daftar Event Pilihan</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition">
            <div class="h-48 bg-slate-200 flex items-center justify-center text-slate-400 text-2xl font-bold">Banner Event
            </div>
            <div class="p-6">
                <span
                    class="text-xs font-bold text-indigo-600 bg-indigo-50 px-2 py-1 rounded-full uppercase tracking-wide">Seminar</span>
                <h3 class="font-bold text-xl text-slate-800 mt-2 mb-2">National Seminar UI/UX Design 2026</h3>
                <p class="text-slate-500 text-sm mb-4">Pembicara expert dari Tech Company terkemuka di Indonesia.</p>
                <a href="/event/1"
                    class="block text-center bg-slate-900 text-white font-medium py-2.5 rounded-xl hover:bg-indigo-600 transition">Lihat
                    Detail</a>
            </div>
        </div>
    </div>
@endsection
