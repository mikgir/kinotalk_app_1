<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'category_id' => ['required', 'exists:categories,id'],
            'title' => ['required', 'min:3', 'max:255'],
            'body' => ['required', 'min:100', 'max:1000'],
            'seo_title' => ['string', 'max:100'],
            'excerpt' => ['string', 'max:120'],
            'slug' => ['string'],
            'meta_description' => ['string'],
            'meta_keywords' => ['string'],
            'status' => ['enum', 'DRAFT'],
        ];
    }
}
