<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name'
    ];

    public static function createRegister($categoryRequest):void {

        $contact = Category::create($categoryRequest);
    }

    public static function getById($id) : Category {

        $category = Category::findOrFail($id);

        return $category;
    }

    public static function editRegister($categoryRequest) : void {

        $category = self::getById($categoryRequest->id);

        $category->update($categoryRequest->all());
    }

    public static function deleteRegister($id) : void {

        $category = self::getById($id);

        $category->delete();
    }

}
