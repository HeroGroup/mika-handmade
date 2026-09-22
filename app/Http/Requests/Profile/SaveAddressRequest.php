<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class SaveAddressRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'address_1' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'post_code' => ['required', 'string', 'max:50'],
            'country' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'default_address' => ['sometimes', 'boolean'],
        ];
    }
}