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

    public static function createRegister($listRequest):void {

        $list = Listing::create($listRequest);
    }

    public static function getById($id) : Listing {

        $list = Listing::findOrFail($id);

        return $list;
    }

    public static function editRegister($listRequest) : void {

        $list = self::getById($listRequest->id);

        $list->update($listRequest->all());
    }

    public static function deleteRegister($id) : void {

        $list = self::getById($id);

        $list->delete();
    }

    public function productsListings()
    {
        return $this->hasMany(ProductListing::class);
    }
}
