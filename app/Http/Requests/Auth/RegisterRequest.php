<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

/**
 * App\Http\Requests\Auth\RegisterRequest
 *
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $token_name
 */
class RegisterRequest extends FormRequest
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
            'email'=>'required|min:6|unique:users,email',
            'name'=>'required|min:6',
            'password'=>'required|min:4',
            'token_name'=>'required|min:1',
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
            'name',
            'password',
            'token_name',
        ];
    }
}
