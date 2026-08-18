<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class StoreCompanyRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('companies', 'email')],
            'website' => ['required', 'string', 'url', 'max:255', Rule::unique('companies', 'website')],
            'logo' => ['required',
            File::image()
                ->min('200')
                ->max('3 * 1024')
                ->dimensions(Rule::dimensions()->maxWidth(500)->maxHeight(500)->ratio(1)),
            ],
        ];
    }
}
