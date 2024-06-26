<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest {
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
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'about' => 'required',
        ];
    }

    public function messages() {
        $required = 'The :attribute field is required.';
        $max = 'The :attribute field must not be greater than :max characters.';
        return [
            'name.required' => $required,
            'name.max' => $max,
            'description.required' => $required,
            'description.max' => $max,
            'about.required' => $required,
        ];
    }
}
