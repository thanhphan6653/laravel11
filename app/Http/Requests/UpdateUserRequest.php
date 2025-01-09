<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'username' => 'nullable|max:30',
            'email' => 'nullable|email|unique',
            'password' => 'nullable|min:6',
            'phone' => 'nullable|numeric|digits_between:10,11|regex:/^[0-9]+$/'
        ];
    }
}
