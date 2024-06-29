<?php

namespace App\Rules;

use App\Facades\Services\Twilio;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PhoneNumber implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! Twilio::validate($value)) {
            $fail(sprintf('The value provided (%s) is not a valid phone number.', $value));
        }
    }
}
