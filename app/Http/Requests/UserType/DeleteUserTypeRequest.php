<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class DeleteUserTypeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'required|exists:user_types,id',
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => 'User type ID is required',
            'id.exists' => 'User type ID must exist',
        ];
    }
}
