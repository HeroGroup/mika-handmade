<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function getTopPageCategory(): ?Category
    {
        return Category::where('is_active', true)
            ->whereNull('category_id')
            ->first();
    }

    public function findActive(int|string $id): ?Category
    {
        return Category::where('id', $id)
            ->where('is_active', true)
            ->firstOrFail();
    }
}