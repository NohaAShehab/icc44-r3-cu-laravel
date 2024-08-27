<?php

namespace App\Rules;

use App\Models\Student;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidStudentName implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
        if(in_array(strtolower($value), ["hero","president", "manager", "student"])){
            $fail("Student Name should be Hero or President or manager or student");
        }
    }
}
