<?php

namespace App\Services;

use App\DTO\UserDTO;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Models\UserStreamKey;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\NewAccessToken;

class AuthService extends Service
{
    /**
     * AuthService constructor.
     * @param User $users
     * @param UserStreamKey $streamKey
     * @param AntMediaServerService $serverService
     */
    public function __construct(
        private User $users,
        private UserStreamKey $streamKey,
        private AntMediaServerService $serverService)
    {
    }


    /**
     * Login and generate token
     * @param UserDTO $userDTO
     * @return NewAccessToken
     * @throws ValidationException
     */
    public function login(UserDTO $userDTO): NewAccessToken
    {
        $user = $this->users->where('email', $userDTO->email)->firstOrFail();

        if (!Hash::check($userDTO->password, $user->password)) {
            throw ValidationException::withMessages([]);
        }
        return $this->generateToken($user, $userDTO->token_name);
    }

    /**
     * @param UserDTO $userDTO
     * @return NewAccessToken
     * @throws GuzzleException
     * @throws Exception
     */
    public function register(UserDTO $userDTO): NewAccessToken
    {
        $user = $this->users->create($userDTO->all());
        $key = $this->serverService->generateStreamKey($user->name);

        $this->streamKey->create([
            'id' => $user->id,
            'key' => $key,
        ]);
        return $this->generateToken($user, $userDTO->token_name);
    }

    /**
     * @param User $user
     * @param string $token_name
     * @return NewAccessToken
     */
    private function generateToken(User $user, string $token_name): NewAccessToken
    {
        return $user->createToken($token_name);
    }

}
