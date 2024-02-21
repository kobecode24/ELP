<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'requirements' => 'nullable|string',
            'points_required' => 'required|integer|min:50|max:100',
            'programming_language_id' => 'nullable|exists:programming_languages,id',
            'spoken_language_id' => 'nullable|exists:spoken_languages,id',
            'image' => 'nullable|image|max:5048',
        ];
    }
}
