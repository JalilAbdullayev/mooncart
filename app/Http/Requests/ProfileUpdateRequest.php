<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest {
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }

    public function messages() {
        $required = 'The :attribute field is required.';
        $max = 'The :attribute must be less than :max characters';
        return [
            'name.required' => $required,
            'name.max' => $max,
            'email.email' => 'Email must be valid',
            'email.lowercase' => 'Email must be lowercase',
            'email.unique' => 'Email already exists',
            'email.max' => $max,
            'email.required' => $required,
        ];
    }
}
