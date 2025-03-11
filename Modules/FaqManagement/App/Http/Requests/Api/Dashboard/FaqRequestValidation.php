<?php

namespace Modules\FaqManagement\App\Http\Requests\Api\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequestValidation extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return[
            'question' => ['required', 'array'],
            'question.en' => ['required', 'string'],
            'question.ar' => ['required', 'string'],

            'answer' => ['required', 'array'],
            'answer.en' =>['required','string'],
            'answer.ar' => ['required','string'],
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
