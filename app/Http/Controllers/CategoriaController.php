<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaRequest;
use App\Models\Categoria;

class CategoryController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        //dd($catetories);
        
        return view('site.categories.index',['categorias' => $categorias]);
        /* Pode ser utilizado também dessa forma no lugar do array:
        compact('categorias')
        */
    }

    public function create()
    {
        return view('site.categorias.create');
    }

    public function store(CategoriaRequest $request, Categoria $categoria)
    {
        $categoria->createRegister($request->all());

        return redirect()->route('categorias');
    }

    public function edit(int $id)
    {
        if ( !$categoria = Categoria::getById($id) ) {
            return redirect()->route('categorias');
        }

        return view('site.categorias.edit', compact('category'));
    }

    public function update(CategoriaRequest $request, int $id)
    {
        if ( !$categoria = Categoria::getById($id) ) {
            return redirect()->route('categorias');
        }

        $categoria->update($request->all());

        return redirect()->route('categorias');
    }

    public function destroy(int $id)
    {
        if ( !$categoria = Categoria::getById($id) ) {
            return redirect()->route('categorias');
        }

        Categoria::deleteRegister($id);
        
        return redirect()->route('categorias');
    }
}
