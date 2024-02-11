<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Http\Requests\StoreListingRequest;
use App\Http\Requests\UpdateListingRequest;

class ListingController extends Controller
{
    public function index(Listing $listing)
    {
        $listings = $listing->all();

        return view('site.listings.index', compact('listings'));
    }

    public function create()
    {
        //
    }

    public function store(StoreListingRequest $request)
    {
        //
    }

    public function edit(Listing $listing)
    {
        //
    }

    public function update(UpdateListingRequest $request, Listing $listing)
    {
        //
    }

    public function destroy(Listing $listing)
    {
        //
    }
}
