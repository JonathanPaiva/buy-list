<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ListaProduto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'listas_produtos';

    protected $fillable = [
        'lista_id',
        'produto_id',
        'quantidade',
        'preco',
        'confirmado'
    ];

    public function listing()
    {
        return $this->belongsTo(Lista::class);
    }

    public function product()
    {
        return $this->belongsTo(Produto::class);
    }

}
