<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class GreaterThanCurrentDate implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ( strtotime($value) < strtotime(now())) {
            $fail('The :attribute must be greater than the current date.');
        }
    }
}
