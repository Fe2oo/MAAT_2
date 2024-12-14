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
           'name'=>['required'],
            'email' => ['required', 'email', 'unique:Users,email,' . $this->route('id')],
            'password' => ['required', 'string', 'min:8'],
            'role'=>['required'],
        ];
    }
    public function messages(){
        return[
                'name.required'=>'Please enter your name',
                'email.required'=>'Please enter your Email',
                'email.email'=>'Not valid Email',
                'email.unique'=>'Email exists',
        ];
    }
}
