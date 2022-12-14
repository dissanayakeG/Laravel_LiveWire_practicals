<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function store()
    {
        $data = request()->validate([
            'title'=>'required',
            'author_id'=>'required'
        ]);
        $data = Book::create($data);
        return response($data,200);
    }

    public function update(Book $book)
    {
        $data = request()->validate([
            'title'=>'required',
            'author_id'=>'required'
        ]);
        //route model binding $book string must similar to route parameter
        $data = $book->update($data);
        return response($data,200);
    }

    public function destroy(Book $book)
    {
        return response($book->delete(),200);
    }
}
