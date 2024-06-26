<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class FAQRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array {
        return [
            'question' => 'required|max:255',
            'answer' => 'required'
        ];
    }

    public function messages(): array {
        $required = 'The :attribute field is required.';
        return [
            'question.required' => $required,
            'question.max' => 'The question may not be greater than 255 characters.',
            'answer.required' => $required
        ];
    }
}
