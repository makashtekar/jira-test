<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|max:20'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'A title is required',
            'title.max' => 'Maximum 20 characters allowed',
        ];
    }
}
