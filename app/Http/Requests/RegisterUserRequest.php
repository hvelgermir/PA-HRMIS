<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'lname' => 'required|regex:/^[\pL\s\-]+$/u',
            'fname' => 'required|regex:/^[\pL\s\-]+$/u',
            'mname' => 'nullable|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'user_role' => 'required'
        ];
    }
}
