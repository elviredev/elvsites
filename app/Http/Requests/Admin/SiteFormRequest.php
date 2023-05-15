<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SiteFormRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3'],
            'description' => ['required', 'min:8'],
            'year' => ['required', 'integer', 'min:4'],
            'client' => ['required', 'min:4'],
            'url_site' => ['nullable'],
            'published' => ['required', 'boolean'],
            'github' => ['required', 'boolean'],
            'category_id' => ['required', 'exists:categories,id'],
            'technologies' => ['required', 'array', 'exists:technologies,id']
        ];
    }
}
