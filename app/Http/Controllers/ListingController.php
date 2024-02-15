<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateListingRequest;
use App\Models\Listing;

class ListingController extends Controller
{
    public function index(Listing $listing)
    {
        $listings = $listing->all();

        return view('site.listings.index', compact('listings'));
    }

    public function create()
    {
        return view('site.listings.create');
    }

    public function store(StoreUpdateListingRequest $request, Listing $listing)
    {
        $listing->createRegister($request->all());

        return redirect()->route('listings');
    }

    public function edit($id)
    {
        if ( !$listing = Listing::getById($id) ) {
            return redirect()->route('listings');
        }

        return view('site.listings.edit', compact('listing'));
    }

    public function update(StoreUpdateListingRequest $request, $id)
    {
        if ( !$listing = Listing::getById($id) ) {
            return redirect()->route('listing');
        }

        $listing->update($request->all());

        return redirect()->route('listings');
    }

    public function destroy($id)
    {
        if ( !$listing = Listing::getById($id) ) {
            return redirect()->route('listing');
        }

        Listing::deleteRegister($id);
        
        return redirect()->route('listings');
    }
}
