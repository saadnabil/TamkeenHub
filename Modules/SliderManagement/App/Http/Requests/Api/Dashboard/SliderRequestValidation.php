<?php

namespace Modules\SliderManagement\App\Http\Requests\Api\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequestValidation extends FormRequest
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
            'btn_title' => ['required', 'array'],
            'btn_title.en' => ['required'],
            'btn_title.ar' => ['required'],

            /**validate btn_title in en & ar */
            'btn_url' => ['required', 'url'],

            'btn_active' => ['required' ,'numeric', 'min:0', 'max:1']


            /**validate icon to be an valid image*/

        ];

        if (request()->isMethod('put')) {

            /**validate icon in update method*/
            $data['background'] = ['nullable', 'image', 'mimes:png,jpg,jpeg,giv,svg'];
        } elseif (request()->isMethod('post')) {

            /**validate icon in post method*/
            $data['background'] = ['required', 'image', 'mimes:png,jpg,jpeg,giv,svg'];
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
