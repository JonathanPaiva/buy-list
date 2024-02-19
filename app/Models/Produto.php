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

    public function categoria ()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function listasprodutos()
    {
        return $this->hasMany(ListaProduto::class);
    }

}
