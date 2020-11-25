<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'email' => ['required','email',\Illuminate\Validation\Rule::unique('users')->ignore($this->user->id)],
            'password' => 'required|min:8|confirmed',
            'user_role' => 'required'
        ];
    }
}
