<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        $categories = $category->all();
        //dd($catetories);
        
        return view('site.categories.index',['categories' => $categories]);
        /* Pode ser utilizado também dessa forma no lugar do array:
        compact('categories')
        */
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
