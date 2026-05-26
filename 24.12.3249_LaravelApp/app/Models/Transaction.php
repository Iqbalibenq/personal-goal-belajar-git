<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // DAFTARKAN NAMA KOLOM DI BAWAH INI AGAR DIIZINKAN MENYIMPAN DATA FORM
    protected $fillable = [
        'event_id',
        'order_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'total_price',
        'status',
        'snap_token',
    ];

    /**
     * Relasi balik ke model Event (Satu transaksi memiliki satu event)
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}