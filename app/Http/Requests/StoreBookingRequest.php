<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'client_name' => ['required', 'string', 'min:2', 'max:80', 'regex:/^[\p{L}’\' -]+$/u'],
            'phone' => ['required', 'string', 'regex:/^\+380\d{9}$/'],
            'service_id' => ['required', 'integer', Rule::exists('services', 'id')],
        ];
    }

    public function messages(): array
    {
        return [
            'client_name.regex' => 'Ім’я може містити лише літери, пробіли, дефіс і апостроф.',
            'phone.regex' => 'Введіть номер у форматі +380XXXXXXXXX.',
            'service_id.exists' => 'Оберіть послугу зі списку.',
        ];
    }
}
