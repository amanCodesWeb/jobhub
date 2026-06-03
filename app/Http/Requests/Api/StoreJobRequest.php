<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'        => ['required', 'string', 'max:255'],
            'company_name' => ['nullable', 'string', 'max:255'],
            'category_id'  => ['nullable', 'exists:categories,id'],
            'salary'       => ['required', 'integer', 'min:100'],
            'description'  => ['required', 'string'],
        ];
    }
}
