<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function __construct(private User $user)
    {
    }


    /**
     * @return UserResource
     */
    public function show(): UserResource
    {
        return new UserResource($this->user->find(auth()->id()));
    }
}
