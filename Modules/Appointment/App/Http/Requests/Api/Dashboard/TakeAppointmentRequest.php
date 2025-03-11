<?php

namespace Modules\Appointment\App\Http\Requests\Api\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class TakeAppointmentRequest extends FormRequest
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
            'datetime' => ['required', 'date', 'date_format:Y-m-d H:i:s'],
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
