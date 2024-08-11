<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class DeleteCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'required|exists:categories,id',
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => 'Category ID is required',
            'id.exists' => 'Category ID must exist',
        ];
    }
}
