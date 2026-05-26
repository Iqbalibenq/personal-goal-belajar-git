<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class AdminPartnerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        // Soal 3: Logika Pencarian Partner
        if ($search) {
            $partners = Partner::where('name', 'LIKE', '%' . $search . '%')->get();
        } else {
            $partners = Partner::all();
        }

        return view('admin.partners.index', compact('partners', 'search'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo_url' => 'required|url'
        ]);

        Partner::create($request->all());
        return redirect()->back()->with('success', 'Partner Berhasil Ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo_url' => 'required|url'
        ]);

        $partner = Partner::findOrFail($id);
        $partner->update($request->all());
        return redirect()->back()->with('success', 'Data Partner Berhasil Diperbarui!');
    }

    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);
        $partner->delete();
        return redirect()->back()->with('success', 'Partner Berhasil Dihapus!');
    }
}