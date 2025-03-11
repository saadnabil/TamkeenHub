<?php

namespace Modules\SettingManagement\App\Http\Requests\Api\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequestValidation extends FormRequest
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

             'address' => ['required', 'array'],
             'address.en' => ['required', 'string'],
             'address.ar' => ['required', 'string'],

             'phones' => ['required', 'array'],
             'phones.phones' => ['nullable', 'array'],
             'phones.mobiles' => ['nullable', 'array'],
             'phones.phones.*' => ['nullable', 'string'],
             'phones.mobiles.*' => ['nullable', 'string'],


             'social_media' => ['required','array'],
             'social_media.linkedin' => ['nullable','url'],
             'social_media.facebook' => ['nullable','url'],
             'social_media.x' => ['nullable','url'],
             'social_media.tiktok' => ['nullable','url'],
             'social_media.instagram' => ['nullable','url'],
             'social_media.YouTube' => ['nullable','url'],

             'long' => ['nullable','string'],
             'lat' => ['nullable','string'],
            'email' => ['nullable','string'],

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
