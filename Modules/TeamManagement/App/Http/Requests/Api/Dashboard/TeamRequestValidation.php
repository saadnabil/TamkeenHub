<?php

namespace Modules\TeamManagement\App\Http\Requests\Api\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequestValidation extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $data = [
            /**validate title in en & ar */
            'name' => ['required', 'array'],
            'name.en' => ['required', 'string'],
            'name.ar' => ['required', 'string'],

            /**validate text in en & ar */
            'position' => ['required', 'array'],
            'position.en' => ['required'],
            'position.ar' => ['required'],
            /**validate icon to be an valid image*/

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
