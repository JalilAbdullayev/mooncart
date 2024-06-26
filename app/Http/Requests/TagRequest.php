<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest {
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
            'title' => 'required|max:255',
        ];
    }

    public function messages(): array {
        return [
            'title.required' => 'The title field is required.',
            'title.max' => 'The title field may not be greater than 255 characters.',
        ];
    }
}
