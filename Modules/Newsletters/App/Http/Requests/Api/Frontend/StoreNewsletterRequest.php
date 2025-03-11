<?php

namespace Modules\Newsletters\App\Http\Requests\Api\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsletterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'unique:newsletters,email'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
