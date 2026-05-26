@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden border-t-8 border-t-indigo-600">
    <div class="p-8 text-center border-b border-dashed border-slate-200">
        <span class="text-xs font-bold bg-emerald-50 text-emerald-600 px-3 py-1 rounded-full uppercase tracking-wider">Tiket Aktif / Lunas</span>
        <h1 class="text-2xl font-black text-slate-800 mt-4 mb-1">E-TICKET AMIKOM</h1>
        <p class="text-xs text-slate-400">ID Order: EVH-2026-3249</p>
    </div>
    <div class="p-8 space-y-4 text-sm bg-slate-50">
        <div class="flex justify-between"><span class="text-slate-500">Nama Event:</span> <strong class="text-slate-800">Seminar UI/UX Design 2026</strong></div>
        <div class="flex justify-between"><span class="text-slate-500">Pemilik:</span> <strong class="text-slate-800">Iqbal Maulana Junaidi</strong></div>
        <div class="flex justify-between"><span class="text-slate-500">NIM:</span> <strong class="text-slate-800">24.12.3249</strong></div>
        <div class="h-32 bg-white border border-slate-200 rounded-xl flex items-center justify-center font-mono text-slate-400 tracking-widest text-xs mt-4">
            [ QR CODE SIMULASI ]
        </div>
    </div>
</div>
@endsection