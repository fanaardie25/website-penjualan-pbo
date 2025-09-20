<?php

namespace App\Http\Controllers;


use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();

        return view('type_books.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('type_books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $type = new Type();
        $type->name = $request->name;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('type', 'public');
        }

        $type->image = $imagePath ?? null;
        $type->save();

        return redirect()->route('type_books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $type_book = Type::find($id);

        return view('type_books.edit', compact('type_book'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, $id)
{
    $type = Type::findOrFail($id);

    $type->name = $request->name;

    if ($request->hasFile('image')) {
        // Hapus image lama kalau ada
        if ($type->image && Storage::disk('public')->exists($type->image)) {
            Storage::disk('public')->delete($type->image);
        }

        // Upload image baru
        $imagePath = $request->file('image')->store('type', 'public');
        $type->image = $imagePath;
    }

    $type->save();

    return redirect()->route('type_books.index');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Type::where('id', $id)->delete();

        return redirect()->route('type_books.index');
    }
}
