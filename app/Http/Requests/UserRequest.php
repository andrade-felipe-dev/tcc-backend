<?php

namespace App\Http\Requests;

use App\UseCases\User\ProfileUserENUM;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|email|unique:users',
            'name' => 'required|string|min:3|max:255',
            'password' => 'required|string|min:6',
            'profile' => ['required', 'string', Rule::in(ProfileUserENUM::toArray())]
        ];
    }
}
