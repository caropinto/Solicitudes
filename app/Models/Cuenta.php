<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    use HasFactory;

    protected $fillable = [
        'saldo',
        'user_id',
        'nombre',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function movimientos()
    {
        return $this->hasMany(Movimiento::class, 'cuenta_id', 'id');
    }
}
