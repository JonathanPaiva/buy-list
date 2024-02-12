<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
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

    public function store(Request $request, Category $category)
    {
        $category->createRegister($request->all());

        return redirect()->route('categories');
    }

    public function edit($id)
    {
        if ( !$category = Category::getById($id) ) {
            return redirect()->route('categories');
        }

        return view('site.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        if ( !$category = Category::getById($id) ) {
            return redirect()->route('categories');
        }

        $category->update($request->all());

        return redirect()->route('categories');
    }

    public function destroy($id)
    {
        if ( !$category = Category::getById($id) ) {
            return redirect()->route('categories');
        }

        Category::deleteRegister($id);
        
        return redirect()->route('categories');
    }
}
