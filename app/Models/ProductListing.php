<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductListing extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'listing_id',
        'product_id',
        'quantity',
        'price',
        'checked'
    ];

    public static function createRegister($productListingRequest):void {

        $productListing = ProductListing::create($productListingRequest);
    }

    public static function getById($id) : ProductListing {

        $productListing = ProductListing::findOrFail($id);

        return $productListing;
    }

    public static function editRegister($productListingRequest) : void {

        $productListing = self::getById($productListingRequest->id);

        $productListing->update($productListingRequest->all());
    }

    public static function deleteRegister($id) : void {

        $productListing = self::getById($id);

        $productListing->delete();
    }

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
