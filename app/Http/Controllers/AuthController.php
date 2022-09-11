<?php

namespace App\Http\Controllers;

use App\DTO\UserDTO;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\Auth\TokenResource;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\NewAccessToken;

class AuthController extends Controller
{
    public function __construct(private AuthService $authService)
    {
    }


    /**
     * @param RegisterRequest $request
     * @return TokenResource
     */
    public function register(RegisterRequest $request): TokenResource
    {
        $userDto = UserDTO::fromArray($request->validated());

        $token = $this->authService->register($userDto);

        return new TokenResource($token);
    }

    /**
     * @param LoginRequest $request
     * @return TokenResource
     * @throws ValidationException
     */
    public function login(LoginRequest $request): TokenResource
    {
        $userDto = UserDTO::fromArray($request->validated());

        $token = $this->authService->login($userDto);

        return new TokenResource($token);
    }
}
