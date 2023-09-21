<?php

namespace App\Http\Requests\Email;

use Illuminate\Foundation\Http\FormRequest;

class EmailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => ['required', 'array', 'min:1', 'exists:users,email'],
            'subject' => ['nullable', 'string'],
            'from_name' => ['nullable', 'string'],
            'message' => ['required', 'string'],
            'now' => ['nullable', 'boolean'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge(['now' => $this->filled('now') && $this->now == 1]);
    }
}
