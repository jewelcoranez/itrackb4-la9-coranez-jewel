<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/whoami', function () {
    return 'Jewel Coranez | Block 4C | ITRACKB4 Laravel 12';
});


Route::get('/books/featured', [BookController::class, 'featured'])
    ->name('books.featured');


Route::get('/books/filter/{value?}', function ($value = null) {
    if ($value === null) {
        return redirect()->route('books.index');
    }

    return redirect()->route('books.index', [
        'genre' => $value,
    ]);
})->name('books.filter');


Route::resource('books', BookController::class)->only([
    'index',
    'show',
    'create',
    'store',
]);

