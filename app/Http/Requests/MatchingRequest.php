<?php

namespace App\Http\Requests;

use App\Rules\EntityRule;
use App\Rules\VoluntaryRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MatchingRequest extends FormRequest
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
            'idVoluntary' => ['required','integer','exists:users,id', new VoluntaryRule()],
            'idEntity' => ['required','integer','exists:users,id', new EntityRule()],
        ];
    }
}
