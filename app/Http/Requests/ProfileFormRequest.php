<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProfileFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth('web')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_id'=>['required', 'exists:users,id'],
            'first_name'=>['nullable', 'string', 'min:3'],
            'last_name'=>['nullable', 'string', 'min:2'],
            'city'=>['nullable', 'string', 'max:255'],
            'country'=>['nullable', 'string', 'max:255'],
            'website'=>['nullable', 'url', 'max:255'],
            'about_me'=>['nullable', 'string', 'max:255'],
            'bio'=>['nullable', 'string', 'max:500'],
            'birthday'=>['nullable', 'date']
        ];
    }

    /**
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'user_id'=>auth('web')->id()
        ]);
    }
}
