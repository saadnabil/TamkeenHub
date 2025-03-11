<?php

namespace Modules\ContactUs\App\Http\Requests\Api\FrontEnd;

use Illuminate\Foundation\Http\FormRequest;

class SendEmailRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['sometimes'],
            'subject' => ['required', 'string'],
            'massage' => ['required', 'string'],
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
