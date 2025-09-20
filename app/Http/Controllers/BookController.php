<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('Books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view('Books.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name'            => 'required|string|max:255',
        'slug'            => 'required|string|max:255|unique:books,slug',
        'description'     => 'nullable|string',
        'writer'          => 'nullable|string|max:255',
        'publisher'       => 'nullable|string|max:255',
        'number_page'     => 'nullable|integer|min:1',
        'price'           => 'required|numeric|min:0',
        'discount'        => 'nullable|numeric|between:0,100',
        'after_discount'  => 'required|numeric|min:0',
        'stock'           => 'nullable|integer|min:0',
        'image'           => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'type_book'       => 'nullable|array',
        'type_book.*'     => 'exists:types,id',
    ]);

    $book = new Book();
    $book->name           = $request->name;
    $book->slug           = $request->slug;
    $book->description    = $request->description;
    $book->writer         = $request->writer;
    $book->publisher      = $request->publisher;
    $book->number_page    = $request->number_page;
    $book->price          = $request->price;
    $book->discount       = $request->discount;
    $book->after_discount = $request->after_discount;
    $book->stock          = $request->stock;

    if ($request->hasFile('image')) {
        $book->image = $request->file('image')->store('books', 'public');
    }

    $book->save();

    if ($request->filled('type_book')) {
        $book->types()->attach($request->type_book);
    }

    return redirect()
        ->route('books.index')
        ->with('success', 'Book created successfully.');
}


    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        $types = Type::all();
        return view('Books.edit', compact('book', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $book = Book::findOrFail($id);
    
    $request->validate([
        'name'            => 'required|string|max:255',
        'slug'            => 'required|string|max:255|unique:books,slug,' . $id,
        'description'     => 'nullable|string',
        'writer'          => 'nullable|string|max:255',
        'publisher'       => 'nullable|string|max:255',
        'number_page'     => 'nullable|integer|min:1',
        'price'           => 'required|numeric|min:0',
        'discount'        => 'nullable|numeric|between:0,100',
        'after_discount'  => 'required|numeric|min:0',
        'stock'           => 'nullable|integer|min:0',
        'image'           => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'type_book'       => 'nullable|array',
        'type_book.*'     => 'exists:types,id',
    ]);

    $validated = $request->only([
        'name', 'slug', 'description', 'writer', 'publisher',
        'number_page', 'price', 'discount', 'after_discount', 'stock'
    ]);

    if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        if ($book->image) {
            Storage::disk('public')->delete($book->image);
        }
        
        $path = $request->file('image')->store('books', 'public');
        $validated['image'] = $path;
    }

    if ($request->discount <= 0) {
        $validated['discount'] = 0;
    }

    $book->update($validated);

    // Update type book
    if ($request->filled('type_book')) {
        $book->types()->sync($request->type_book);
    } else {
        // Jika tidak ada type yang dipilih, hapus semua relasi
        $book->types()->detach();
    }

    return redirect()
        ->route('books.index')
        ->with('success', 'Book updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);

        if ($book->image) {
            Storage::disk('public')->delete($book->image);
        }

        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Book deleted successfully.');
    }
}
