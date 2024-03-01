<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExerciseRequest extends FormRequest
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
    public function rules()
    {
        return [
            'question' => 'required|string|max:255',
            'initial_code' => 'nullable|string',
            'test_code' => 'required|string',
            'expected_output' => 'required|string',
            'points_reward' => 'required|integer|min:1|max:10',
            'chapter_id' => 'required|exists:chapters,id', // Ensure the chapter exists
        ];
    }
}
