<?php

namespace App\Http\Requests\Stream;

use Illuminate\Foundation\Http\FormRequest;

/**
 * App\Http\Requests\Auth\LoginRequest
 *
 * @property string $title
 * @property string $description
 * @property $image
 */
class StoreRequest extends FormRequest
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
            'title'=>'required|min:3',
            'description'=>'required|min:3',
            'image'=>'required|image',
        ];
    }

    /**
     * Get validate fields key
     * @return string[]
     */
    public static function getKeys(): array
    {
        return [
            'title',
            'description',
            'image',
        ];
    }
}
