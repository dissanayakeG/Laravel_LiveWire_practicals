<?php

use Illuminate\Support\Facades\Route;
use App\Facades\PostCard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
//    $commentsFromWebPHP = \App\Models\Comment::all();
//    return view('welcome', compact('commentsFromWebPHP'));
    return view('welcome');
});

Route::get('/collection', \App\Http\Livewire\Collection::class);
Route::get('/events', \App\Http\Livewire\Events::class);


Route::get('/facades',  function () {
    PostCard::hello('my message', 'mds@gmail.com');
});

Route::post('/books', [\App\Http\Controllers\BookController::class, 'store' ]);
Route::patch('/books/{book}', [\App\Http\Controllers\BookController::class, 'update' ]);
Route::patch('/books/{book}', [\App\Http\Controllers\BookController::class, 'destroy' ]);
