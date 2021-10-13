<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\{UserController, BookController, UserBookController};

Route::apiResource('users', UserController::class);

Route::get('books/search', [BookController::class, 'search'])
    ->name('books.search');
Route::apiResource('books', BookController::class);
Route::get('/users/{user}/books', [UserBookController::class, 'index'])
    ->name('users.books.index');
Route::get(
    '/users/{user}/books/{book}/attach', [UserBookController::class, 'attach']
)
->name('users.books.attach');
Route::get(
    '/users/{user}/books/{book}/detach', [UserBookController::class, 'detach']
)
->name('users.books.detach');

/*
Route::middleware(['auth:sanctum'])->group(
    function () {
        Route::apiResource('users', UserController::class);
        Route::get('books/search', [BookController::class, 'search'])
            ->name('books.search');
        Route::apiResource('books', BookController::class);
        Route::get('/users/{user}/books', [UserBookController::class, 'index'])
            ->name('users.books.index');
        Route::get('/users/{user}/books/{book}/attach', [UserBookController::class, 'attach'])
            ->name('users.books.attach');
        Route::get('/users/{user}/books/{book}/detach', [UserBookController::class, 'detach'])
            ->name('users.books.detach');
    }
);
*/
