<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    public function index(Product $product)
    {
        $products = $product->all();

        return view('site.products.index', compact('products'));
    }

    public function create()
    {
        //
    }

    public function store(StoreProductRequest $request)
    {
        //
    }

    public function edit(Product $product)
    {
        //
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}
