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

    public static function createRegister($productlistingRequest):void {

        $productlisting = ProductListing::create($productlistingRequest);
    }

    public static function getById($id) : ProductListing {

        $productlisting = ProductListing::findOrFail($id);

        return $productlisting;
    }

    public static function editRegister($productlistingRequest) : void {

        $productlisting = self::getById($productlistingRequest->id);

        $productlisting->update($productlistingRequest->all());
    }

    public static function deleteRegister($id) : void {

        $productlisting = self::getById($id);

        $productlisting->delete();
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
