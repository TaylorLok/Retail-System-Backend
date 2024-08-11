<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Category name is required',
            'name.string' => 'Category namemust be a string',
            'name.max' => 'Category name cannot exceed 255 characters',
            'description.string' => 'Description must be a text',
        ];
    }
}
