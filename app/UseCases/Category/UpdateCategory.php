<?php

namespace App\UseCases\Category;

use App\Models\Category;

class UpdateCategory
{
    public function execute(Category $category, CategoryDTO $dto): Category
    {
        $data = $dto->toArray();

        $category->update($data);

        return $category;
    }
}
