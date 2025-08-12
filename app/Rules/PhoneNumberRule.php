<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PhoneNumberRule implements ValidationRule
{
    private const PHONE_PATTERN = "/^0\d{9,10}$/";

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! is_string($value) || ! preg_match(self::PHONE_PATTERN, $value)) {
            $fail($this->message());
        }
    }

    public function message(): string
    {
        return __('validation.phone', [
            'attribute' => __('view.customer.phone_number'),
        ]);
    }
}
