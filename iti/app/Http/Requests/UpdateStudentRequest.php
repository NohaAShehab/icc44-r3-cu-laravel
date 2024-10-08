<?php

namespace App\Http\Requests;

use App\Models\Student;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
//        return true;
        return $this->user()->can('update', $this->student);
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
            "name"=>"required",
            "email"=>[
                "required",
                "email",
                Rule::unique("students",'email')->ignore($this->student)
            ],
            "grade"=>"integer",
            "image"=>"image|mimes:jpeg,jpg,png|max:2048"
        ];
    }


    function messages()
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
