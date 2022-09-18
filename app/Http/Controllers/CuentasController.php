<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuenta;

class CuentasController extends Controller
{
    public function view($id){
        $cuenta = Cuenta::find($id);
        return view('cuenta', compact('cuenta'));
    }

    public function newMovement($id){
        $cuenta = Cuenta::find($id);
        return view('movimiento', compact('cuenta'));
    }
}
