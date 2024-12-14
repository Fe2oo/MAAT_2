<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
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
            'user_name'=>['nullable'],
            'trip_name' => ['nullable'],
            'place' => ['required','string'],
            'phone' => ['required','numeric','digits:11','regex:/^(010|011|012|015)\d{8}$/'],

        ];
    }
}
