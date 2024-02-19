<?php

namespace App\Http\Controllers;

use App\Models\Produto;

class ProductController extends Controller
{
    public function index(Produto $produto)
    {
        $produtos = $produto->all();

        return view('site.produtos.index', compact('produtos'));
    }

    public function create()
    {
        //
    }

    public function store($request)
    {
        //
    }

    public function edit(Produto $product)
    {
        //
    }

    public function update($request, Produto $product)
    {
        //
    }

    public function destroy(Produto $product)
    {
        //
    }
}
