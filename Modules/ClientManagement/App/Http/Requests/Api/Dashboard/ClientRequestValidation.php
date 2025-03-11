<?php

namespace Modules\ClientManagement\App\Http\Requests\Api\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequestValidation extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $data = [];

        if(request()->isMethod('put')){

              /**validate icon in update method*/
            $data['logo'] = ['nullable','image','mimes:png,jpg,jpeg,giv,svg'];

        }elseif(request()->isMethod('post')){
            
            /**validate icon in post method*/
            $data['logo'] = ['required','image','mimes:png,jpg,jpeg,giv,svg'];

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
