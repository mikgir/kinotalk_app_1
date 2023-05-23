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
            'first_name'=>['required', 'sting', 'max:50'],
            'last_name'=>['required', 'sting', 'max:255'],
            'occupation'=>['sting', 'max:255'],
            'company'=>['sting', 'max:255'],
            'city'=>['required', 'sting', 'max:255'],
            'country'=>['required', 'sting', 'max:255'],
            'website'=>['sting', 'max:255'],
            'about_me'=>['required', 'sting', 'max:255'],
            'bio'=>['sting', 'max:500'],
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
