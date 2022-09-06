<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'valor',
        'tipo',
        'descripcion',
        'cuenta_id',
        'categoria_id',
    ];

    public function cuenta()
    {
        return $this->belongsTo(Cuenta::class, 'cuenta_id', 'id');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id');
    }
}
