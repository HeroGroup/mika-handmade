<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'description' => 'string',
            'price' => 'required|decimal:0,2',
            'categories' => 'array|min:1',
            'variants' => 'nullable|array',
            'variants.*.size' => 'nullable|string',
            'variants.*.color' => 'nullable|string',
            'variants.*.quantity' => 'nullable|integer|min:0',
            'variants.*.price' => 'nullable|decimal:0,2',
        ];
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator): void {
            $combinations = [];

            foreach ($this->input('variants', []) as $index => $variant) {
                $size = strtolower(trim((string) ($variant['size'] ?? '')));
                $color = strtolower(trim((string) ($variant['color'] ?? '')));

                if ($size === '' && $color === '') {
                    continue;
                }

                $combination = $size.'|'.$color;
                if (isset($combinations[$combination])) {
                    $validator->errors()->add(
                        "variants.$index",
                        'This size and color combination is duplicated.'
                    );
                    continue;
                }

                $combinations[$combination] = true;
            }
        });
    }
}
