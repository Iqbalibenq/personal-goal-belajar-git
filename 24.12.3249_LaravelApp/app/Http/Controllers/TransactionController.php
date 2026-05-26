<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // 1. PROSES SIMPAN FORM PENDAFTARAN TIKET (PERTEMUAN 6)
    public function store(Request $request, $eventId)
    {
        $request->validate([
            'customer_name'  => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
        ]);

        $event = Event::findOrFail($eventId);

        // Validasi jika stok habis
        if ($event->stock <= 0) {
            return redirect()->back()->with('error', 'Maaf, kuota tiket untuk event ini sudah habis!');
        }

        // Generate Order ID Unik
        $orderId = 'EVT-' . time() . '-' . rand(100, 999);

        try {
            // Langsung Simpan ke database dengan status 'Success' (Atau 'Pending' sesuai kebutuhan)
            Transaction::create([
                'event_id'       => $event->id,
                'order_id'       => $orderId,
                'customer_name'  => $request->customer_name,
                'customer_email' => $request->customer_email,
                'customer_phone' => $request->customer_phone,
                'total_price'    => $event->price,
                'status'         => 'Pending', // Jika ingin default pendaftaran masuk sebagai pending dulu di tabel admin
            ]);

            // Kurangi stok tiket
            $event->decrement('stock');

            // LANGSUNG LEMPAR KE LANDING DENGAN NOTIFIKASI SUKSES (ALUR RESMI UTS)
            return redirect()->route('landing')->with('success', 'Pendaftaran tiket ' . $event->title . ' berhasil dilakukan!');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memproses pendaftaran: ' . $e->getMessage());
        }
    }

    // 2. HALAMAN TRANSAKSI ADMIN - SUDAH TERURUT DARI YANG TERBARU (SOAL UTS 3)
    public function index()
    {
        // Mengambil data transaksi dan mengurutkannya dari yang TERBARU (latest)
        $transactions = Transaction::latest()->get(); 

        return view('admin.orders', compact('transactions'));
    }
}