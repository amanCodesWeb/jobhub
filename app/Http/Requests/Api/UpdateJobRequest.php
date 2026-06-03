<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateJobRequest extends FormRequest
{
    /**
     * Authorize: only the owner (or an admin) may update a job.
     */
    public function authorize(): bool
    {
        $job = $this->route('job');

        return $job && Gate::allows('modify', $job);
    }

    public function rules(): array
    {
        return [
            'title'        => ['sometimes', 'required', 'string', 'max:255'],
            'company_name' => ['nullable', 'string', 'max:255'],
            'category_id'  => ['nullable', 'exists:categories,id'],
            'salary'       => ['sometimes', 'required', 'integer', 'min:100'],
            'description'  => ['sometimes', 'required', 'string'],
        ];
    }
}
