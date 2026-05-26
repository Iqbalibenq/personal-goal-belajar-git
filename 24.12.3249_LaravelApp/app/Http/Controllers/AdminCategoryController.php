<?php

namespace App\Http\Controllers;

use App\Models\Category; // Memastikan model Category ter-import
use Illuminate\Http\Request;
use Illuminate\Support\Str; // PENTING: Menambahkan import Str agar \Str::slug tidak merah/error

class AdminCategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        // Soal 3: Logika Pencarian menggunakan LIKE
        if ($search) {
            $categories = Category::where('name', 'LIKE', '%' . $search . '%')->get();
        } else {
            $categories = Category::all();
        }

        return view('admin.categories.index', compact('categories', 'search'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);

        // Menggunakan Str::slug yang sudah diimport di atas
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->back()->with('success', 'Kategori Berhasil Ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $category = Category::findOrFail($id);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->back()->with('success', 'Nama Kategori Berhasil Diubah!');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('success', 'Kategori Berhasil Dihapus!');
    }
}
