<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listing extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'completed',
        'completed_date'
    ];

    public static function createRegister($listingRequest):void {

        $listing = Listing::create($listingRequest);
    }

    public static function getById($id) {

        $listing = Listing::findOrFail($id);

        return $listing;
    }

    public static function editRegister($listingRequest) : void {

        $listing = self::getById($listingRequest->id);

        $listing->update($listingRequest->all());
    }

    public static function deleteRegister($id) : void {

        $listing = self::getById($id);

        $listing->delete();
    }

    public function productsListings()
    {
        return $this->hasMany(ProductListing::class);
    }
}
