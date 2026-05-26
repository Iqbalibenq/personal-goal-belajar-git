@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white border border-slate-200 rounded-3xl p-8 shadow-sm">
    <h1 class="text-2xl font-bold text-slate-800 mb-2">Formulir Checkout</h1>
    <p class="text-slate-500 text-sm mb-6">Selesaikan pemesanan tiket Anda dengan mengisi data di bawah.</p>
    <form class="space-y-4">
        <div>
            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Nama Lengkap</label>
            <input type="text" value="Iqbal Maulana Junaidi" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" readonly>
        </div>
        <div>
            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Metode Pembayaran</label>
            <select class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <option>QRIS / Gopoay</option>
                <option>Transfer Bank Mandiri/BCA</option>
            </select>
        </div>
        <a href="/my-ticket" class="block text-center bg-indigo-600 text-white font-bold py-3 rounded-xl hover:bg-indigo-700 transition mt-6">Konfirmasi Pembayaran</a>
    </form>
</div>
@endsection