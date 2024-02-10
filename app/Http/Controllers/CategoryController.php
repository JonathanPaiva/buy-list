<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return $categories;
    }

    public function create()
    {
        //
    }

    public function store(StoreCategoryRequest $request)
    {
        //
    }

    public function edit(Category $category)
    {
        //
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    public function destroy(Category $category)
    {
        //
    }
}
