<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:20',
            'deadline' => 'required|date',
            'description' => 'required|min:5'

        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'A title is required',
            'title.max' => 'Maximum 20 characters allowed',
            'deadline.required' => 'Deadline is required',
            'deadline.date' => 'Deadline should be valid date',
            'description.required' => 'Description is required',
            'description.min' => 'Minimum 5 characters required'
        ];
    }
}
