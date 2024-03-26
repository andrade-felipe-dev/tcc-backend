<?php

namespace App\UseCases\Category;

class DestroyCategory
{
    public function execute($category)
    {
        $category->delete();
    }
}
