<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductCategory;

class ProductService
{
    public function getProductData(int|string $id): ?array
    {
        $product = Product::with([
            'images',
            'categories.category',
            'attributes.attributeValue.attribute',
        ])
        ->where('id', $id)
        ->where('is_active', true)
        ->firstOrFail();

        $variantOptions = [];
        foreach ($product->attributes as $attribute) {
            $variantOptions[] = $this->buildVariantOption($attribute);
        }

        if (empty($variantOptions)) {
            $variantOptions[] = [
                'id' => null,
                'price' => (float) $product->price,
                'quantity' => (int) $product->quantity,
                'in_stock' => (int) $product->quantity > 0,
                'attributes' => [],
                'label' => 'Default',
            ];
        }

        return [
            'product' => $product,
            'product_images' => $product->images,
            'category_id' => ProductCategory::where('product_id', $id)->first()?->category_id,
            'variantOptions' => $variantOptions,
            'variantGroups' => $this->buildVariantGroups($variantOptions),
        ];
    }

    private function buildVariantGroups(array $variantOptions): array
    {
        $variantGroups = [];

        foreach ($variantOptions as $variantOption) {
            foreach ($variantOption['attributes'] as $attributeName => $attributeValue) {
                if (blank($attributeValue)) {
                    continue;
                }

                $variantGroups[$attributeName]['name'] = $attributeName;
                $variantGroups[$attributeName]['label'] = ucfirst($attributeName);
                $variantGroups[$attributeName]['options'][$attributeValue] = [
                    'value' => $attributeValue,
                ];
            }
        }

        return array_values($variantGroups);
    }

    private function buildVariantOption(ProductAttribute $attribute): array
    {
        $attributes = [];
        $label = $attribute->attributeValue?->value;
        $labelParts = [];

        if ($label) {
            foreach (preg_split('/\s*(?:\/|,)\s*/', $label) as $part) {
                if (! str_contains($part, ':')) {
                    continue;
                }

                [$attributeName, $attributeValue] = explode(':', $part, 2);
                $attributeName = trim(strtolower($attributeName));
                $attributeValue = trim($attributeValue);

                if ($attributeName && $attributeValue) {
                    $attributes[$attributeName] = $attributeValue;
                    $labelParts[] = ucfirst($attributeName).': '.$attributeValue;
                }
            }
        }

        if (empty($attributes) && $attribute->attributeValue) {
            $attributes[$attribute->attributeValue->attribute?->name ?? 'variant'] = $attribute->attributeValue->value;
            $labelParts[] = $attribute->attributeValue->value;
        }

        return [
            'id' => $attribute->id,
            'price' => (float) $attribute->price,
            'quantity' => (int) $attribute->quantity,
            'in_stock' => (int) $attribute->quantity > 0,
            'attributes' => $attributes,
            'label' => implode(' / ', $labelParts) ?: 'Variant',
        ];
    }
}