<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nome'
    ];

    public static function createRegister($categoriaRequest):void 
    {
        $categoria = Categoria::create($categoriaRequest);
    }

    public static function getById(int $id) 
    {
        $categoria = Categoria::find($id);

        return $categoria;
    }

    public static function editRegister($categoriaRequest) : void 
    {
        $categoria = self::getById($categoriaRequest->id);

        $categoria->update($categoriaRequest->all());
    }

    public static function deleteRegister(int $id) : void 
    {
        $categoria = self::getById($id);

        $categoria->delete();
    }

    public function products()
    {
        return $this->hasMany(Produto::class);
    }

}
