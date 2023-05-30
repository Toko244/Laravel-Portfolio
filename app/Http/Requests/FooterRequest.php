<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FooterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'number' => ['string', 'nullable'],
            'short_description' => ['nullable'],
            'address' => ['string', 'nullable'],
            'country' => ['string', 'nullable'],
            'email' => ['string', 'nullable'],
            'facebook' => ['string', 'nullable'],
            'twitter' => ['string', 'nullable'],
            'instagram' => ['string', 'nullable'],
            'linkedin' => ['string', 'nullable'],
        ];
    }
}
