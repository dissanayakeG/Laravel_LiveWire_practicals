<?php

namespace App\Http\Controllers;

use App\Models\Book;

class BookCheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkout(Book $book)
    {
        return $book->checkout(auth()->user());
    }

    public function checkin(Book $book)
    {
        try{
            return $book->checkin(auth()->user());
        }catch (\Exception $e){
            return response([], 404);
        }
    }
}
