<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Http\Requests\StoreListingRequest;
use App\Http\Requests\UpdateListingRequest;
use Illuminate\Http\Request;

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

    public function store(Request $request, Listing $listing)
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

    public function update(Request $request, $id)
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
