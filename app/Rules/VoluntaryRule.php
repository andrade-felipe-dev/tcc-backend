<?php

namespace App\Rules;

use App\UseCases\Matching\ValidationParticipants;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class VoluntaryRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!ValidationParticipants::isVoluntary($value->id)) {
            $fail("Entity is not valid");
        }
    }
}
