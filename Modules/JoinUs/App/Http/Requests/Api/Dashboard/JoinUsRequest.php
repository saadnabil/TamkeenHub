<?php

namespace Modules\JoinUs\App\Http\Requests\Api\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class JoinUsRequest extends FormRequest
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
            'cv' => ['required','file', 'mimes:pdf,doc,docx','max:2048'],
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
