<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'description',
        'image_url',
        'price',
        'quantity',
        'is_active',
    ];

    protected $dates = ['deleted_at'];

    public function categories(): HasMany
    {
        return $this->hasMany(ProductCategory::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }
}
