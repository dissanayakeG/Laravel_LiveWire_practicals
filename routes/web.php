<?php

use Illuminate\Support\Facades\Route;
use App\Facades\PostCard;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookCheckoutController;

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

Route::get('/blade-tests', function () {
    return view('bladeTest');
});

Route::get('/livewire', \App\Http\Livewire\Collection::class);
Route::get('/events', \App\Http\Livewire\Events::class);
Route::get('/form', \App\Http\Livewire\FormSubmit::class);


Route::get('/facades',  function () {
    PostCard::hello('my message', 'mds@gmail.com');
});

Route::post('/books', [BookController::class, 'store' ]);
Route::patch('/books/{book}', [BookController::class, 'update' ]);
Route::delete('/books/{book}', [BookController::class, 'destroy']);

Route::post('/checkout/{book}', [BookCheckoutController::class, 'checkout' ]);
Route::post('/checkin/{book}', [BookCheckoutController::class, 'checkin' ]);


Route::post('/author', [AuthorController::class, 'create' ]);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
