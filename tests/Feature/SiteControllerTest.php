<?php

use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('passes product variants and stock information to the product view', function () {
    $user = User::factory()->create();

    $product = Product::create([
        'title' => 'Test Product',
        'description' => 'Test description',
        'image_url' => '/images/test.jpg',
        'price' => 25.00,
        'base_quantity' => 5,
        'is_active' => true,
    ]);

    $colorAttribute = Attribute::create(['name' => 'Color']);
    $colorValue = AttributeValue::create([
        'attribute_id' => $colorAttribute->id,
        'value' => 'Red',
    ]);

    $product->attributes()->create([
        'attribute_value_id' => $colorValue->id,
        'quantity' => 0,
        'price' => 30.00,
    ]);

    $response = $this->actingAs($user)->get(route('client.product', $product->id));

    $response->assertOk();
    $response->assertViewHas('variantOptions');
    $response->assertViewHas('variantGroups');

    $variantOptions = $response->viewData('variantOptions');
    expect($variantOptions)->toHaveCount(1);
    expect($variantOptions[0]['quantity'])->toBe(0);
    expect($variantOptions[0]['in_stock'])->toBeFalse();
});
