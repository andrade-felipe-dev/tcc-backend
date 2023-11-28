<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatchingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'idVoluntary' => 'required|integer|exists:users,id',
            'idEntity' => 'required|integer|exists:users,id'
        ];
    }
}
