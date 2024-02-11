<?php

namespace App\Http\Controllers;

use App\Models\ProductListing;
use App\Http\Requests\StoreProductListingRequest;
use App\Http\Requests\UpdateProductListingRequest;

class ProductListingController extends Controller
{
    public function index(ProductListing $productListing)
    {
        $productsListings = $productListing->all();

        return view('site.products-listings.index', compact('productsListings'));
    }

    public function create()
    {
        //
    }

    public function store(StoreProductListingRequest $request)
    {
        //
    }

    public function edit(ProductListing $productListing)
    {
        //
    }

    public function update(UpdateProductListingRequest $request, ProductListing $productListing)
    {
        //
    }

    public function destroy(ProductListing $productListing)
    {
        //
    }
}
