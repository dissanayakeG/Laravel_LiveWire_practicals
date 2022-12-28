<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function create()
    {
        $data = Author::create(request()->only([
            'name', 'dob'
        ]));

        return response($data, 200);
    }
}
