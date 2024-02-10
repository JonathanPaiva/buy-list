<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'category_id'
    ];

    public static function createRegister($productRequest):void {

        $contact = Product::create($productRequest);
    }

    public static function getById($id) : Product {

        $product = Product::findOrFail($id);

        return $product;
    }

    public static function editRegister($productRequest) : void {

        $product = self::getById($productRequest->id);

        $product->update($productRequest->all());
    }

    public static function deleteRegister($id) : void {

        $product = self::getById($id);

        $product->delete();
    }

    public function category ()
    {
        return $this->belongsTo(Category::class);
    }

    public function productsListings()
    {
        return $this->hasMany(ProductListing::class);
    }

}
