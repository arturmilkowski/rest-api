<?php

declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\SmsApi;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return UserResource
     */
    public function index(): UserResource
    {
        return new UserResource(User::all());
    }

    /**
     * Store a newly created user in storage.
     *
     * @param Request $request Request
     * 
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $user = User::create($request->all());

        return response()->json(
            [
                'data' => [
                    'created' => true,
                    'user' => $user
                ]
            ], 201
        );
    }

    /**
     * Display the specified user.
     *
     * @param User $user User
     * 
     * @return UserResource
     */
    public function show(User $user): UserResource
    {
        return new UserResource($user);
    }

    /**
     * Update the specified user in storage.
     *
     * @param Request $request Request
     * @param User    $user    User
     * 
     * @return JsonResponse
     */
    public function update(Request $request, User $user): JsonResponse
    {
        $user->fill($request->all());
        $user->save();

        $updatedUser = new UserResource($user);

        return response()->json(
            [
                'data' => [
                    'updated' => 'true',
                    'user' => $updatedUser
                ]
            ], 200
        );
    }

    /**
     * Remove the specified user from storage.
     *
     * @param User $user User
     * 
     * @return JsonResponse
     */
    public function destroy(User $user): JsonResponse
    {
        $deleted = $user->delete();
        
        $smsApi = new SmsApi();
        $smsApi->sendSms(
            $phoneNumber = '505891315', // $user->phoneNumber
            $msg = 'You have been removed from test application.'
        );

        return response()->json(['data' => ['deleted'  => $deleted]], 200);
    }
}
