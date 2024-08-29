<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

use App\Rules\ValidStudentName;
class StoreStudentRequest extends FormRequest
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
            //
//            "name"=>"required",
            "name"=>[
                "required",
                new ValidStudentName(),
            ],
            "email"=>"required|email|unique:students",
            "grade"=>"integer",
            "image"=>"image|mimes:jpeg,jpg,png|max:2048",
            "gender"=> Rule::in(['male', 'female']),
        ];
    }
    public  function messages(): array
    {
        return [
            "name.required"=>"No student without name",
            "email.required"=>"No student without email",
            "email.email"=>"Invalid email for this student",
            "email.unique"=>"Student with this email already exists",
            "grade.integer"=>"Invalid grade",
        ];
    }
}
