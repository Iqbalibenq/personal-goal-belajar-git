<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard'); // Merender halaman dashboard admin
    }

    public function events()
    {
        return view('admin.events'); // Merender halaman data event admin
    }

    public function categories()
    {
        return view('admin.categories.index'); // Tugas mandiri halaman 19
    }
}