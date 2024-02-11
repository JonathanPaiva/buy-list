<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;

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
        return view('site.categories.create');
    }

    public function store(Request $request)
    {
        dd($request->all());
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
