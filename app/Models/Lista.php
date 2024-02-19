<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lista extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'finalizada',
        'finalizada_data'
    ];

    public static function createRegister($listaRequest):void {

        $lista = Lista::create($listaRequest);
    }

    public static function getById(int $id) {

        $lista = Lista::findOrFail($id);

        return $lista;
    }

    public static function editRegister($listaRequest) : void {

        $lista = self::getById($listaRequest->id);

        $lista->update($listaRequest->all());
    }

    public static function deleteRegister(int $id) : void {

        $lista = self::getById($id);

        $lista->delete();
    }

    public function listsproducts()
    {
        return $this->hasMany(ListaProduto::class);
    }
}
