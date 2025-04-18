<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() {
        $books = Book::paginate(10);
        return view('admin.books.index', compact('books'));
    }
    
    public function create() {
        $categories = Category::all();
        return view('admin.books.create', compact('categories'));
    }

    public function store(Request $request) {
        // Validasi data
        $this->validateBook($request);
        
        // menyimpan si cover
        $coverImage = $request->file('cover');
        $coverImageName = time() . '.' . $coverImage->getClientOriginalExtension();
        $coverImage->move(public_path('cover_images'), $coverImageName);

        // proses menyimpan data
        Book::create([
            'title'     => $request->title,
            'author'    => $request->author,
            'year'      => $request->year,
            'category_id' => $request->category_id,
            'publisher' => $request->publisher,
            'stock'     => $request->stock,
            'cover'     => 'cover_images/' . $coverImageName
        ]);

        return redirect()->route('book')->with('message', "Berhasil menambahkan data buku");
    }

    // Detail Buku
    public function detail($id) {
        $book = Book::find($id);
        // return $book->id;
        return view('admin.books.detail', compact('book'));
    }

    // Edit
    public function edit($id) {
        $book = Book::find($id);
        $categories = Category::all();
        return view('admin.books.edit', compact('categories', 'book'));
    }

    public function validateBook(Request $request) {
        // syarat validasi
        $rules = [
            'title'         => 'required|string|max:255',
            'author'        => 'required|string|max:255',
            'year'          => 'required|numeric',
            'category_id'   => 'required|numeric',
            'publisher'     => 'required|string|max:255',
            'stock'         => 'required|numeric',
            'cover'         => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ];

        $request->validate($rules);


    }
}
