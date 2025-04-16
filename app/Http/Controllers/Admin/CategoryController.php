<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'name'  => 'required|string|max:225'
        ],
        [
            'name.required' => 'Nama wajib diisi',
            'name.string'   => 'Nama wajib huruf',
            'name.max'      => 'Nama lebih dari 225 karakter',
        ]
    );

         Category::create([
            'name'  => $request->name,
         ]);
         return redirect()->route('category')->with('message', 'Berhasil menambahkan data kategori');
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name'  => 'required|string|max:225'
        ],
        [
            'name.required' => 'Nama wajib diisi',
            'name.string'   => 'Nama wajib huruf',
            'name.max'      => 'Nama lebih dari 225 karakter',
        ]
    );
        $category = Category::findOrFail($id);
        $category->update([
            'name'  => $request->name,
         ]);
         return redirect()->route('category')->with('message', 'Berhasil update data kategori');
    }

    public function destroy($id) {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category')->with('message', 'Data category berhasil dihapus');

    }
}
