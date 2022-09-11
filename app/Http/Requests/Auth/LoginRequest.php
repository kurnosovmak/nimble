<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * App\Http\Requests\Auth\LoginRequest
 *
 * @property string $email
 * @property string $password
 * @property string $token_name
 */
class LoginRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|exists:users,email',
            'password' => 'required|min:4',
            'token_name' => 'required|min:1',
        ];
    }

    /**
     * Get validate fields key
     * @return string[]
     */
    public static function getKeys(): array
    {
        return [
            'email',
            'password',
            'token_name',
        ];
    }
}
