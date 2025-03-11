<?php

namespace Modules\PackageManagement\App\Http\Requests\Api\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequestValidation extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            /**validate title in en & ar */
            'title' => ['required', 'array'],
            'title.en' => ['required', 'string'],
            'title.ar' => ['required', 'string'],

            'price_annual' => ['required', 'numeric', 'min:0'],
            'price_monthly' => ['required', 'numeric', 'min:0'],
            'discount_annual' => ['nullable', 'numeric', 'min:0','max:100'],
            'discount_monthly' => ['nullable', 'numeric', 'min:0','max:100'],
            'active_status' => ['required', 'numeric', 'in:0,1'],
            'bordered_status' => ['required', 'numeric', 'min:1'],
            

            /**validate features */
            'features' => ['required', 'array'],
            'features.*.title' => ['required', 'array'],
            'features.*.title.en' => ['required', 'string'],
            'features.*.title.ar' => ['required', 'string'],
            'features.*.checked_status' => ['required', 'numeric', 'in:0,1'],

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
