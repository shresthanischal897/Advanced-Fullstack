<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|integer|min:1',
            'fee' => 'required|numeric|between:0,999999.99',
            'difficulty' => [
                'required',
                Rule::in(['Easy', 'Medium', 'Hard']),
            ],
            'is_active' => 'sometimes|boolean',
        ];
    }
}
