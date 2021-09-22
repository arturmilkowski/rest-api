<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\{UserController, BookController, UserBookController};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

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