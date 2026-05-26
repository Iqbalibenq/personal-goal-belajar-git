<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function show()
    {
        return view('event-detail'); // Sesuai instruksi modul hal 17 nomor 4
    }

    public function checkout()
    {
        return view('checkout'); // Sesuai instruksi modul hal 17 nomor 5
    }

    public function ticket()
    {
        return view('ticket'); // Sesuai instruksi modul hal 17 nomor 6
    }
}