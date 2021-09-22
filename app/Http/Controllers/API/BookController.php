<?php

declare(strict_types=1);

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\BookResource;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the books.
     *
     * @return BookResource
     */
    public function index(): BookResource
    {
        return new BookResource(Book::all());
    }

    /**
     * Store a newly created book in storage.
     *
     * @param Request $request Request
     * 
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $book = Book::create($request->all());

        return response()->json(
            [
                'data' => [
                    'created' => true,
                    'book' => $book
                ]
            ], 201
        );
    }

    /**
     * Display the specified book.
     *
     * @param Book $book Book
     * 
     * @return BookResource
     */
    public function show(Book $book): BookResource
    {
        return new BookResource($book);
    }

    /**
     * Update the specified book in storage.
     *
     * @param Request $request Request
     * @param Book    $book    Book
     * 
     * @return JsonResponse
     */
    public function update(Request $request, Book $book): JsonResponse
    {
        $book->fill($request->all());
        $book->save();

        $updatedBook = new BookResource($book);

        return response()->json(
            [
                'data' => [
                    'updated' => 'true',
                    'book' => $updatedBook
                ]
            ], 200
        );
    }

    /**
     * Remove the specified book from storage.
     *
     * @param Book $book Book
     * 
     * @return JsonResponse
     */
    public function destroy(Book $book): JsonResponse
    {
        $deleted = $book->delete();
        
        return response()->json(['data' => ['deleted'  => $deleted]], 200);
    }

    /**
     * Search books.
     *
     * @param Request $request Request
     * 
     * @return BookResource
     */
    public function search(Request $request): BookResource
    {
        $searchedPhrase = $request->get('s');
        
        $books = DB::table('books')
            ->where('title', 'like', "%{$searchedPhrase}%")
            ->orWhere('short_description', 'like', "%{$searchedPhrase}%")
            ->orWhere('description', 'like', "%{$searchedPhrase}%")
            ->get();
        
        return new BookResource($books);
    }
}
