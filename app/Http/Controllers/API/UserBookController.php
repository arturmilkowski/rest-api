<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserBookCollection;
use App\Models\{User, Book};
use Illuminate\Http\JsonResponse;

class UserBookController extends Controller
{
    /**
     * Display a listing of the user's books.
     *
     * @param User $user User
     * 
     * @return UserBookCollection
     */
    public function index(User $user): UserBookCollection
    {
        return new UserBookCollection($user->books);
    }
    
    /**
     * Attach the book to the user.
     *
     * @param User $user User
     * @param Book $book Book
     * 
     * @return JsonResponse
     */
    public function attach(User $user, Book $book): JsonResponse
    {
        $user->books()->attach($book);
        
        return response()->json(['data' => ['success' => true]], 200);
    }

    /**
     * Detach the book from the user,
     *
     * @param User $user User
     * @param Book $book Book
     * 
     * @return JsonResponse
     */
    public function detach(User $user, Book $book): JsonResponse
    {
        $user->books()->detach($book);

        return response()->json(['data' => ['success' => true]], 200);
    }
}
