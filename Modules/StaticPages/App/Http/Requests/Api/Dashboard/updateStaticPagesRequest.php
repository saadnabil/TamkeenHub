<?php

namespace Modules\StaticPages\App\Http\Requests\Api\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class updateStaticPagesRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [

            /**validate title in en & ar */
            'name' => ['required', 'exists:static_pages,name'],

            /**validate title in en & ar */
            'title' => ['required', 'array'],
            'title.en' => ['required', 'string'],
            'title.ar' => ['required', 'string'],

            /**validate text in en & ar */
            'text' => ['required', 'array'],
            'text.en' => ['required'],
            'text.ar' => ['required'],

            /**validate image */
            'image' => ['sometimes', 'image', 'mimes:png,jpg,jpeg,gif,svg'],


            /**validate icon to be an valid image*/
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
