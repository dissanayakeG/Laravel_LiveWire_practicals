<?php

use Illuminate\Support\Facades\Route;
use App\Facades\PostCard;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookCheckoutController;
use Illuminate\Support\Facades\Auth;


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

// Route::get('/', function () {
//     $commentsFromWebPHP = \App\Models\Comment::all();
//     return view('welcome', compact('commentsFromWebPHP'));
//     return view('welcome');
// });

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    } else {
        return view('welcome');
    }
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/blade-tests', function () {
        return view('bladeTest');
    });

    Route::get('/facades',  function () {
        PostCard::hello('my message', 'mds@gmail.com');
    });

    Route::get('/livewire', \App\Livewire\Collection::class)->middleware(['auth']);
    Route::get('/events', \App\Livewire\Events::class);
    Route::get('/form', \App\Livewire\FormSubmit::class);
    Route::get('/alpine', \App\Livewire\Alpine::class);

    Route::post('/books', [BookController::class, 'store']);
    Route::patch('/books/{book}', [BookController::class, 'update']);
    Route::delete('/books/{book}', [BookController::class, 'destroy']);

    Route::post('/checkout/{book}', [BookCheckoutController::class, 'checkout']);
    Route::post('/checkin/{book}', [BookCheckoutController::class, 'checkin']);

    Route::post('/author', [AuthorController::class, 'create']);
});

require __DIR__ . '/auth.php';
