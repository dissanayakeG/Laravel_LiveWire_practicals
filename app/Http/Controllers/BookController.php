<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function store()
    {
        $data = Book::create($this->requestValidation());
        return response($data,200);
    }

    public function update(Book $book)
    {
        //route model binding $book string must similar to route parameter
        $data = $book->update( $this->requestValidation());
        return response($data,200);
    }

    protected function requestValidation()
    {
        $data = request()->validate([
            'title'=>'required',
            'author'=>'required'
        ]);
    }

    public function destroy(Book $book)
    {
        return response($book->delete(),200);
    }
}
