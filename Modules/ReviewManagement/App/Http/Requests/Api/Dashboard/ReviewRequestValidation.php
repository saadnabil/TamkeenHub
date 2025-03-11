<?php

namespace Modules\ReviewManagement\App\Http\Requests\Api\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequestValidation extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $data = [

            /**validate text in en & ar */
            'text' => ['required', 'array'],
            'text.en' =>['required','string'],
            'text.ar' => ['required','string'],
        ];

        if (request()->isMethod('put')) {
            /**validate icon in update method*/
            $data['image'] = ['nullable', 'image', 'mimes:png,jpg,jpeg,giv,svg'];
        } elseif (request()->isMethod('post')) {

            /**validate icon in post method*/
            $data['image'] = ['required', 'image', 'mimes:png,jpg,jpeg,giv,svg'];
        }

        return $data;
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
