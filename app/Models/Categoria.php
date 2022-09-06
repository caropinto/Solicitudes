<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre'
    ];

    public function movimientos()
    {
        return $this->hasMany(Movimiento::class, 'categoria_id', 'id');
    }
}
