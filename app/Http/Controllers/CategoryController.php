<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\UseCases\Category\CategoryDTO;
use App\UseCases\Category\CreateCategory;
use App\UseCases\Category\UpdateCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(CategoryRequest $request)
    {
        $data = CategoryDTO::validateAndCreate($request->validated());

        app(CreateCategory::class)->execute($data);

        return response()->json([], 201);
    }

    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 10);

        return app(Category::class)->paginate($perPage);
    }

    public function show(Category $category)
    {
        return CategoryResource::make($category);
    }

    public function update(Category $category, CategoryRequest $request)
    {
        $data = CategoryDTO::validateAndCreate($request->validated());

        $category = app(UpdateCategory::class)->execute($category, $data);

        return CategoryResource::make($category);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return response()->noContent();
    }
}
