<?php

namespace Modules\ServiceManagement\App\Http\Requests\Api\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequestValidation extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $data = [
            /**validate title in en & ar */
            'title' => ['required','array'],
            'title.en' => ['required','string'],
            'title.ar' => ['required','string'],

             /**validate text in en & ar */
            'text' => ['required','array'],
            'text.en' => ['required','string'],
            'text.ar' =>['required','string'],

             /**validate icon to be an valid image*/
           
        ];

        if(request()->isMethod('put')){

              /**validate icon in update method*/
            $data['icon'] = ['nullable','image','mimes:png,jpg,jpeg,giv,svg'];

        }elseif(request()->isMethod('post')){
            
            /**validate icon in post method*/
            $data['icon'] = ['required','image','mimes:png,jpg,jpeg,giv,svg'];

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
