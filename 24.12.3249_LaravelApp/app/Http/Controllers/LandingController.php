<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use App\Models\Partner; // Mengimport model Partner agar rapi
use Illuminate\Http\Request;

class LandingController extends Controller
{
    // CUKUP SATU FUNGSI INDEX SAJA (Sudah digabung untuk Kategori & Partner UTS)
    public function index(Request $request)
    {
        $categories = Category::all();
        
        // Soal UTS 4: Mengambil seluruh data partner dari database
        $partners = Partner::all();
        
        // Mengambil id kategori dari URL jika ada filter (?category_id=1)
        $categoryId = $request->query('category_id');

        if ($categoryId) {
            // Jika kategori diklik, ambil event yang sesuai saja
            $events = Event::where('category_id', $categoryId)->get();
        } else {
            // Jika tidak diklik, tampilkan semua event
            $events = Event::all();
        }

        // Mengirimkan semua variabel ke halaman depan (landing.blade.php)
        return view('landing', compact('events', 'categories', 'categoryId', 'partners'));
    }

    public function detail($id)
    {
        $event = Event::findOrFail($id);
        return view('detail', compact('event'));
    }

    public function register($id)
    {
        $event = Event::findOrFail($id);
        return view('register', compact('event'));
    }
}