<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()?->is_admin ?? false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('employees', 'email')],
            'number' => ['required', 'string', 'regex:/^(\+44\s?|\(?0\)?)?(\d{4}|\d{3})\s?\d{3}\s?\d{3,4}$/', Rule::unique('employees', 'number')],
            'company_id' => ['required', 'integer', 'exists:companies,id'],
        ];
    }
}