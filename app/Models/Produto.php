<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'categoria_id'
    ];

    public static function createRegister($produtoRequest):void {

        $produto = Produto::create($produtoRequest);
    }

    public static function getById(int $id) : Produto {

        $produto = Produto::findOrFail($id);

        return $produto;
    }

    public static function editRegister($produtoRequest) : void {

        $produto = self::getById($produtoRequest->id);

        $produto->update($produtoRequest->all());
    }

    public static function deleteRegister(int $id) : void {

        $Produto = self::getById($id);

        $Produto->delete();
    }

    public function category ()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function ProdutosListings()
    {
        return $this->hasMany(ListaProduto::class);
    }

}
