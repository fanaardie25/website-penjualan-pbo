<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use SweetAlert2\Laravel\Swal;

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

        Swal::fire([
            'title' => 'Success !',
            'position' => 'top-end',
            'text'  => 'Status updated successfully',
            'icon'  => 'success',
            'timer' => '3000',
            'toast' => true,
            'showConfirmButton' => false,
            'timerProgressBar' => true,
        ]);

        return back()->with('success', 'Status updated successfully!');
    }
}
