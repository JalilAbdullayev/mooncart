<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StaffRequest extends FormRequest {
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
            'position' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages() {
        $required = 'The :attribute field is required.';
        $max = 'The :attribute may not be greater than 255 characters.';
        return [
            'name.required' => $required,
            'name.max' => $max,
            'position.required' => $required,
            'position.max' => $max,
            'image.image' => 'The :attribute must be an image.',
            'image.mimes' => 'The :attribute must be a file of type: jpeg, png, jpg, gif, svg.',
            'image.max' => 'The :attribute may not be greater than 2048 kilobytes.',
        ];
    }
}
