<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterEmployeeRequest extends FormRequest
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
            'gender' => 'required',
            'dob' => 'required|date',
            'department_id' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'lname' => 'Last Name',
            'fname' => 'First Name',
            'mname' => 'Middle Name',
            'dob' => 'Date of Birth',
            'gender' => 'Gender',
            'department_id' => 'Department'
        ];
    }

    public function messages()
    {
        return [
            'lname.regex' => 'Field must only have letters.',
            'fname.regex' => 'Field must only have letters.',
            'mname.regex' => 'Field must only have letters.',
        ];
    }
}
