<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
        // dd('asdasda');
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'father_name' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:users,email',
            'phone' => 'required|string|max:20',
            'phone_2' => 'nullable|string|max:20',
            'birth_date' => 'required|date',
            'gender' => 'required',
            'avatar' => 'required|file|image|max:2048',
            'passport_series' => 'required|string|max:10',
            'passport_number' => 'required|string|max:10',
            'passport_pdf' => 'required|file|mimes:pdf|max:2048',
            'education' => 'required|in:school,college',
            'diploma_series' => 'required|string|max:10',
            'diploma_pdf' => 'required|file|mimes:pdf|max:2048',
            'education_livel' => 'required|in:bachelor,master',
            'course_direction' => 'required|string|max:255',
            'educate_direction' => 'required|string|max:255',
            'passport_rus' => 'nullable|file|mimes:pdf|max:2048',
            'propiska' => 'nullable|file',
        ];
    }
}
