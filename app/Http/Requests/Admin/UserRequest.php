<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $userId = $this->route('user')?->id;

        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email' . ($userId ? ",{$userId}" : '')],
        ];

        $rules['password'] = $this->isMethod('post') ?
          ['required', 'string', 'min:8', 'confirmed'] :
          ['nullable', 'string', 'min:8', 'confirmed'];

        return $rules;
    }
}
