<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class ManageOrderController extends Controller
{
    public function index()
    {
        $userBooks = User::with('books')->get();
        return view('ManageOrders.index', compact('userBooks'));
    }


    public function updateStatus(Request $request, User $user, Book $book)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,completed,canceled',
        ]);

        
        $user->books()->updateExistingPivot($book->id, [
            'status' => $validated['status'],
        ]);

        return back()->with('success', 'Status updated successfully!');
    }
}
