<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductAttribute extends Model
{
    protected $fillable = [
        'product_id',
        'attribute_value_id',
        'quantity',
        'price',
    ];

    protected $casts = [
        'quantity' => 'integer',
        'price' => 'decimal:2',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function attributeValue(): BelongsTo
    {
        return $this->belongsTo(AttributeValue::class, 'attribute_value_id');
    }

    public function stockMovements(): HasMany
    {
        return $this->hasMany(ProductQuantity::class);
    }

    public function decreaseStock(int $amount, string $reason = 'sale'): ProductQuantity
    {
        if ($amount < 1) {
            throw new \InvalidArgumentException('Quantity must be greater than 0.');
        }

        $this->refresh();
        $quantityBefore = $this->quantity;

        $updated = static::query()
            ->whereKey($this->getKey())
            ->where('quantity', '>=', $amount)
            ->decrement('quantity', $amount);

        if ($updated !== 1) {
            throw new \RuntimeException('Insufficient stock available.');
        }

        $this->refresh();

        return $this->stockMovements()->create([
            'product_id' => $this->product_id,
            'product_attribute_id' => $this->id,
            'quantity' => $quantityBefore,
            'quantity_change' => -$amount,
            'remaining_quantity' => $this->quantity,
            'reason' => $reason,
        ]);
    }
}
