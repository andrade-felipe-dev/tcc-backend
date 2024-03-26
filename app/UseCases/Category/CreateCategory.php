<?php

namespace App\UseCases\Category;

use App\Models\Category;

class CreateCategory
{
    public function execute(CategoryDTO $categoryDTO): Category
    {
        $data = $categoryDTO->toArray();

        return app(Category::class)->create($data);
    }
}
