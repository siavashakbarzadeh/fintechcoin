<?php

namespace App\Http\Requests\Email;

use Illuminate\Contracts\Validation\Validator;
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
            'emails' => ['required', 'array', 'min:1', 'exists:users,email'],
            'subject' => ['nullable', 'string'],
            'from_name' => ['nullable', 'string'],
            'message' => ['required', 'string'],
            'now' => ['nullable', 'boolean'],
            'schedule_date' => ['nullable', 'date'],
            'schedule_time' => ['nullable','date_format:h:i A'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge(['now' => $this->filled('now') && $this->now == 1]);
    }

    protected function failedValidation(Validator $validator)
    {
        dd($validator);
        parent::failedValidation($validator); // TODO: Change the autogenerated stub
    }
}
