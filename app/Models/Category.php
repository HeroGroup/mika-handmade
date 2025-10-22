<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'image_url',
        'is_active',
        'category_id',
    ];

    protected $dates = ['deleted_at'];

    public function main_category(): BelongsTo
    {
        return $this->BelongsTo(Category::class, 'category_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(ProductCategory::class);
    }

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }
}
