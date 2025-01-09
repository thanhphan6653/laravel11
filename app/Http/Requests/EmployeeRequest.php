<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            
            'username' => ['required', 'string', 'max:30'],               // Tối đa 30 ký tự
            'email' => ['required', 'email', 'unique:employee,email'], // Email đúng định dạng và không trùng
            'phone_number' => ['required', 'numeric'],                 //SĐT bắt buộc ở dạng số
        ];
    }

    public function messages(){
        return [
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email phải đúng định dạng.',
            'email.unique' => 'Email này đã tồn tại.',
            'username.required' => 'Username không được để trống.',
            'username.max' => 'Username không được vượt quá 30 ký tự.',
            'phone_number.required' => 'Số điện thoại không được để trống.',
            'phone_number.numeric' => 'Số điện thoại phải là kiểu số.',
        ];
    }
}
