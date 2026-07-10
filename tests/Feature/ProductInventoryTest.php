<?php

use App\Models\Product;
use App\Models\ProductAttribute;

it('summarizes stock from product variants', function () {
    $product = Product::create([
        'title' => 'Test product',
        'description' => 'Test description',
        'price' => 25.00,
        'quantity' => 0,
        'image_url' => '',
        'is_active' => true,
    ]);

    $product->attributes()->create([
        'quantity' => 5,
        'price' => 25.00,
    ]);

    $product->attributes()->create([
        'quantity' => 3,
        'price' => 30.00,
    ]);

    expect($product->fresh()->quantity)->toBe(8);
});

it('decrements stock and records the remaining quantity on sale', function () {
    $product = Product::create([
        'title' => 'Variant product',
        'description' => 'Variant description',
        'price' => 50.00,
        'quantity' => 0,
        'image_url' => '',
        'is_active' => true,
    ]);

    $variant = $product->attributes()->create([
        'quantity' => 4,
        'price' => 50.00,
    ]);

    $variant->decreaseStock(2);

    $variant->refresh();

    expect($variant->quantity)->toBe(2);
    expect($variant->stockMovements()->latest()->first()?->remaining_quantity)->toBe(2);
});
