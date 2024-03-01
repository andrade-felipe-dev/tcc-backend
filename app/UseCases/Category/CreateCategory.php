<?php

namespace App\UseCases\Category;

use App\Models\Category;

class CreateCategory
{
    public function execute(CategoryDTO $categoryDTO): bool
    {
        $data = $categoryDTO->toArray();

        return !!app(Category::class)->create($data);
    }
}
