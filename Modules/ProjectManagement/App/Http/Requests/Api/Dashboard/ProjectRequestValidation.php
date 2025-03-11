<?php

namespace Modules\ProjectManagement\App\Http\Requests\Api\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectRequestValidation extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $data = [
            /**validate title in en & ar */
            'title' => ['required', 'array'],
            'title.en' => ['required', 'string'],
            'title.ar' => ['required', 'string'],

            /**validate text in en & ar */
            'text' => ['required', 'array'],
            'text.en' =>['required','string'],
            'text.ar' => ['required','string'],

            /**validate btn_title in en & ar */
            'type' => ['required','string', Rule::in(ProjectTypes())],
            'delivered_status' => ['required','numeric','in:0,1'],

            'address' => ['required', 'array'],
            'address.en' => ['required','string'],
            'address.ar' => ['required','string'],

            'images' => []
            
            
        ];

        if (request()->isMethod('put')) {
            $data['images'] = ['nullable', 'array'];
            $data['images.*'] = ['image', 'mimes:png,jpg,jpeg,giv,svg'];
        } elseif (request()->isMethod('post')) {

            $data['images'] = ['required', 'array'];
            $data['images.*'] = ['image', 'mimes:png,jpg,jpeg,giv,svg'];
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
