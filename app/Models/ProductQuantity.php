<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductQuantity extends Model
{
    protected $fillable = [
        'product_id',
        'product_attribute_id',
        'quantity',
        'quantity_change',
        'remaining_quantity',
        'reason',
    ];

    protected $casts = [
        'quantity' => 'integer',
        'quantity_change' => 'integer',
        'remaining_quantity' => 'integer',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function productAttribute(): BelongsTo
    {
        return $this->belongsTo(ProductAttribute::class);
    }
}
